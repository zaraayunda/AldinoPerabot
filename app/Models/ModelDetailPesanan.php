<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDetailPesanan extends Model
{
    protected $table = 'detail_pesanan';
    protected $primaryKey = 'iddetailpesanan';

    protected $allowedFields = [
        'iddetailpesanan',
        'idpesanan',
        'idproduk',
        'qty',
        'harga',
        'diskon',
        'subtotal'
    ];
}
