<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeranjang extends Model
{
     protected $table = 'keranjang';
    protected $primaryKey = 'idkeranjang';

    protected $allowedFields = [
        'idkeranjang',
        'idpelanggan',
        'idproduk',
        'tglkeranjang',
        'qty',
        'statuskeranjang'
    ];
}
