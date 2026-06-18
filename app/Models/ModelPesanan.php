<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'idpesanan';

    protected $allowedFields = [
        'idpesanan',
        'idpelanggan',
        'tanggalpesanan',
        'totalharga',
        'statuspesanan'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(idpesanan, 4, 6)) AS nourut FROM pesanan");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'PSN' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }
}
