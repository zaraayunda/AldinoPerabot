<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDetailPengajuan extends Model
{
     protected $table = 'detail_pengajuan_custom';
    protected $primaryKey = 'iddetailcustom';

    protected $allowedFields = [
        'iddetailcustom',
        'idpengajuan',
        'namaprodukcustom',
        'detailcustom',
        'fotoreferensi',
        'qty',
        'hargacustom'
    ];
}
