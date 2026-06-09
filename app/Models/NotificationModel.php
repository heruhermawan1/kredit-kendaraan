<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notikasi';
    protected $primaryKey = 'id';
    protected $allowedField = ['id_pengguna', 'judul', 'pesan', 'tipe', 'sudah_dibaca', 'dibuat_pada',];

    public function getByUserId($userId, $limit = null)
    {
        $query =$this->where('id_pengguna', $userId)->orderBy('dibuat_pada', 'DESC');
        if ($limit) {
            $query = $query->limit($limit);
        }
        return $query->findAll();
    }

    public function getUnreadCount($userId)
    {
        return $this->where('id_pengguna', $userId)->where('sudah_dibaca', 0)->countAllResults();
    }
}