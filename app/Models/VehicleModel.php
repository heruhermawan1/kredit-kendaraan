<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'merek', 'tipe', 'harga', 'tahun', 'stok', 'url_gambar', 'deskripsi', 'dibuat_pada', 'diperbarui_pada'];
    protected $useTimestamps = false; // Disable automatic timestamps
    // protected $createdField  = 'dibuat_pada';
    // protected $updatedField  = 'diperbarui_pada';
}
