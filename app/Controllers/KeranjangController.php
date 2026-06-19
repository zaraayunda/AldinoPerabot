<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelPengguna;
use App\Models\ModelKeranjang;
use App\Models\ModelPelanggan;


class KeranjangController extends BaseController
{
    public function simpan($idproduk)
    {
        $modelKeranjang = new ModelKeranjang();
        $modelPelanggan = new ModelPelanggan();
        $iduser = session()->get('iduser');

        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        $idpelanggan = $pelanggan['idpelanggan'];

        // Cek apakah produk sudah ada di keranjang
        $cek = $modelKeranjang
            ->where('idpelanggan', $idpelanggan)
            ->where('idproduk', $idproduk)
            ->where('statuskeranjang', 'aktif')
            ->first();

        // Jika sudah ada, tambah qty
        if ($cek) {

            $modelKeranjang->update(
                $cek['idkeranjang'],
                [
                    'qty' => $cek['qty'] + 1
                ]
            );
        } else {

            // Jika belum ada, insert baru
            $modelKeranjang->insert([
                'idpelanggan' => $idpelanggan,
                'idproduk' => $idproduk,
                'tanggalkeranjang' => date('Y-m-d'),
                'qty' => 1,
                'statuskeranjang' => 'aktif'
            ]);
        }

        return redirect()->back()
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
