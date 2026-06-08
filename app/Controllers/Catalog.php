<?php

namespace App\Controllers;

use App\Models\VehicleModel;

class Catalog extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        $type = $this->request->getGet('type') ?: 'all';
        $brand = $this->request->getGet('brand') ?: 'all';
        $search = $this->request->getGet('q');

        $vehicleModel = new VehicleModel();
        $builder = $vehicleModel;

        if ($type !== 'all') {
            $builder = $builder->where('tipe', $type);
        }

        if ($brand !== 'all') {
            $builder = $builder->where('merek', $brand);
        }

        if ($search) {
            $builder = $builder->groupStart()
                ->like('nama', $search)
                ->orLike('merek', $search)
                ->groupEnd();
        }

        $vehicles = $builder->findAll();
        $brands = $vehicleModel->select('merek')->distinct()->orderBy('merek')->findAll();

        return view('catalog/index', [
            'vehicles' => $vehicles,
            'user' => session()->get('user'),
            'type' => $type,
            'brand' => $brand,
            'brands' => $brands,
            'search' => $search,
        ]);
    }

    public function detail($id)
    {
        helper(['form', 'url']);
        $vehicleModel = new VehicleModel();
        $vehicle = $vehicleModel->find($id);

        if (!$vehicle) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kendaraan tidak ditemukan');
        }

        return view('catalog/detail', [
            'vehicle' => $vehicle,
            'user' => session()->get('user'),
        ]);
    }

    public function simulation()
    {
        helper(['form', 'url']);
        $vehicleModel = new VehicleModel();
        $vehicles = $vehicleModel->findAll();

        return view('catalog/simulation', [
            'vehicles' => $vehicles,
            'user' => session()->get('user'),
            'result' => null,
        ]);
    }

    public function simulationPost()
    {
        helper(['form', 'url']);
        $price = (float)$this->request->getPost('price');
        $dp = (float)$this->request->getPost('dp');
        $tenor = (int)$this->request->getPost('tenor');
        $rate = (float)$this->request->getPost('rate');

        $monthlyInterest = $rate / 100 / 12;
        $principal = max($price - $dp, 0);
        $monthly = $principal * ($monthlyInterest / (1 - pow(1 + $monthlyInterest, -$tenor)));
        $total = $monthly * $tenor;
        $interestTotal = $total - $principal;

        return view('catalog/simulation', [
            'vehicles' => (new VehicleModel())->findAll(),
            'user' => session()->get('user'),
            'result' => [
                'monthly' => round($monthly),
                'principal' => round($principal),
                'interest' => round($interestTotal),
                'total' => round($total),
                'price' => $price,
                'dp' => $dp,
                'tenor' => $tenor,
                'rate' => $rate,
            ],
        ]);
    }
}
