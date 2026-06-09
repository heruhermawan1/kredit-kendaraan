<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pengajuan', 'jumlah', 'metode', 'url_bukti', 'status', 'catatan', 'dibuat_pada', 'diperbarui_pada'];
    protected $userTimestamps =true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diperbarui_pada';
}
