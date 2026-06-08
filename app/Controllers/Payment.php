<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\PaymentModel;

class Payment extends BaseController
{
 public function index()
 {
     helper(['form', 'url']);
     $user = session()->get('user');
     if (!$user) {
        return redirect()->to('/login');
     }

     $applications = (new ApplicationModel())
            ->where('id_pengguna', $user['id'])
            ->where('status', 'approved')
            ->findAll();

     $payments = (new PaymentModel())
            ->select('pembayaran.*, kendaraan.nama. as nama_kendaraan')
            ->join('pengajuan', 'pengajuan.id = pembayaran.id_pengajuan')
            ->join('kendaraan', 'kendaraan.id = pengajuan.id_kendaraan')
            ->where('pengajuan.id_pengguna', $user['id'])
            ->orderBy('pembayaraan.dibuat_pada', 'DESC')
            ->findAll();

     return view('payment/index', [
        'user'  => $user,
        'applications' => $applications,
        'payments' => $payments,
     ]);
    }

    public function submit()
    {
        helper(['form', 'url']);
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        $application = (new ApplicationModel())->find($this->request->getPost('application_id'));
        if (!$application || $applications['id_pengguna'] != $user['id']) {
            return redirect()->back()->with('error', 'Pengajuan tidak valid');
        }
        $data = [
            'id_pengajuan' => $application[ 'id'],
            'jumlah' => $this->request->getPost('amount'),
            'metode' => $this->request->getPost('method'),
            'url_bukti' => $this->request->getPost('receipt_url'),
            'status' => 'pending',
            'catatan' => $this->request->getPost('note'),
        ];

        (new PaymentModel())->insert($data);
        return redirect()->to('/payment')->with('success', 'Pembayaran berhasil dikirim. Tunggu verifikasi admin.');
    }
    
    public function schedules()
    {
        helper(['form', 'url']);
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        // Ambil semua pengajuan yang disetujui milik user  ini
        $applications = (new ApplicationModel())
            ->where('id_pengguna', $user['id'])
            ->where('status', 'approved')
            ->findAll();

        $schedules = [];

        foreach ($applications as $app) {
           $vehicle = (new  \App\Models\VehicleModel())->find($app['id_kendaraan']);

           // Coba ambil jadwal dari tabel jadwal_pembayaran
           $rows = (new \App\Models\PaymentScheduleModel())
                ->where('id_pengajuan', $app['id'])
                ->orderBy('nomor_angsuran', 'ASC')
                ->findAll();

        if (empty($rows)) {
            // Generate jadwal dari data pengajuan jika belum ada di tabel
            $r  =$app['tingkat bunga'] / 100 / 12;
            $n = (int) $app['tenor'];
            $p =$vehicle['harga'] - $app['uang muka'];
            $cicilan = ($r > 0 && $n > 0 && $p > 0)
                ? round($p * ($r / (1 - pow(1 + $r, -$n))))
                :($n > 0 ? round($p / $n) : 0);  

            for ($i = 1; $i <= $n;$i++) {
                    $schedules[] = [
                        'id'    => null,
                        'nama_kendaraan'         => $vehicle['nama'],
                        'nomor_angsuran'         => $i,
                        'total_angsuran'         => $n,
                        'jumlah'                 => $cicilan,
                        'tanggal_jatuh_tempo'    => date('Y-m-d', strtotime("+{$i} month", strtotime($app['dibuat_pada']))),
                        'status'                 => 'pending',
                    ];
                }
            } else {
                foreach ($rows as $row) {
                    $schedules[] = [
                        'id'      => $row['id'],
                        'nama_kendaraan'  => $vehicle['nama'],
                        'nomor_angsuran'  => $row['nomor_angsuran'],
                        'total_angsuran'  => $app['tenor'],
                        'jumlah'          => $row['jumlah'],
                        'tanggal_jatuh_tempo'  => $row['tanggal_jatuh_tempo'],
                        'status'          => $row['status'],
                    ];
                }
            }
        }

        return view('payment/schedules', [
            'user'    => $user,
            'schedules' => $schedules,
        ]);
    }
}
    


                    

    
