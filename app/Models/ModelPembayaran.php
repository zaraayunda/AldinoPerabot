<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'idpembayaran';

    protected $allowedFields = [
        'idpembayaran',
        'idpesanan',
        'jenispembayaran',
        'metode_pembayaran',
        'jumlahbayar',
        'bukti_pembayaran',
        'statuspembayaran',
        'tanggalpembayaran'
    ];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(SUBSTRING(idpembayaran, 4, 6)) AS nourut FROM pembayaran");
        $row = $query->getRowArray();
        $nourut = (int) $row['nourut'] + 1;
        $newId = 'PBY' . str_pad($nourut, 6, '0', STR_PAD_LEFT);
        return $newId;
    }
}
