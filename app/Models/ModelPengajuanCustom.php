<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengajuanCustom extends Model
{
    protected $table = 'pengajuan_custom';
    protected $primaryKey = 'idpengajuan';

    protected $allowedFields = [
        'idpengajuan',
        'idpelanggan',
        'tanggalpengajuan',
        'statuscustom'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(idpengajuan, 5, 6)) AS nourut FROM pengajuan_custom");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'PGCT' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }
}
