<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'iduser';

    protected $allowedFields = [
        'iduser',
        'namauser',
        'email',
        'username',
        'password',
        'role',
        'status'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(iduser, 4, 6)) AS nourut FROM user");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'USR' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }

    public function ceklogin($login)
    {
        return $this->db->table('user')
            ->groupStart()
            ->where('username', $login)
            ->orWhere('email', $login)
            ->groupEnd()
            ->get()
            ->getRowArray();
    }
}
