<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'idpelanggan';

    protected $allowedFields = [
        'idpelanggan',
        'iduser',
        'namapelanggan',
        'alamat',
        'nohp'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(idpelanggan, 4, 6)) AS nourut FROM pelanggan");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'PLG' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }
}
