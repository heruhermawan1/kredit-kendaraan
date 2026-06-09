<?php

namespace App\Models;

use CodeIgnite\Model;

class ApplicationModel extends Model
{
    protected $table = 'pengajuan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pengguna', 'id_kendaraan', 'uang_muka', 'tenor', 'tingkat_bunga', 'status', 'catatan_penolakan', 'dibuat_pada', 'diperbarui-pada',];
    protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diperbarui_pada';
    
}