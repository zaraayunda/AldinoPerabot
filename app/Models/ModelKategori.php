<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';

    protected $allowedFields = [
        'idkategori',
        'namakategori',
        'deskripsi'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(idkategori, 4, 6)) AS nourut FROM kategori");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'KTG' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }
}
