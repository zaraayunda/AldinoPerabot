<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'idproduk';

    protected $allowedFields = [
        'idproduk',
        'idkategori',
        'namaproduk',
        'jenisproduk',
        'harga',
        'diskon',
        'detailproduk',
        'foto',
        'statusproduk'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(idproduk, 4, 6)) AS nourut FROM produk");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'PDK' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }
}
