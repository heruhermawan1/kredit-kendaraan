<?php

namespace App\Models;

use CodeIgniter\Model;

class InterestRateModel extends Model
{
   protected $table = 'tingkat_bunga';
   protected $primaryKey = 'id';
   protected $allowedField = ['nama', 'bunga', 'tenor_min', 'tenor_max', 'aktif', 'dibuat_pada', 'diperbarui_pada',];
   protected $useTimestamp = true;
   protected $createdField = 'dibuat_pada';
   protected $updatedField = 'diperbarui_pada';
   
   public function getActiveRates()
   {
      return $this->where('aktif', 1)->findAll();
   }
}