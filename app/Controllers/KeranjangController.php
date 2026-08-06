<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelPengguna;
use App\Models\ModelKeranjang;
use App\Models\ModelPelanggan;
use App\Models\ModelPesanan;
use App\Models\ModelDetailPesanan;


class KeranjangController extends BaseController
{
    public function simpan($idproduk)
    {
        $modelKeranjang = new ModelKeranjang();
        $modelPelanggan = new ModelPelanggan();
        $session = session();
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
        $session->setFlashdata([
            'icon'  => 'success',
            'title' => 'Produk Ditambahkan',
            'msg'   => 'Produk berhasil ditambahkan ke keranjang.'
        ]);
        return redirect()->to('/keranjang');
    }

    public function tampilankeranjang()
    {
        $modelKeranjang = new ModelKeranjang();
        $modelPelanggan = new ModelPelanggan();

        $iduser = session()->get('iduser');

        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        if (!$pelanggan) {

            return redirect()->back()
                ->with(
                    'error',
                    'Data pelanggan tidak ditemukan.'
                );
        }

        $idpelanggan = $pelanggan['idpelanggan'];

        $keranjang = $modelKeranjang
            ->select(
                '
            keranjang.*,
            produk.namaproduk,
            produk.foto,
            produk.harga,
            produk.diskon
        '
            )
            ->join(
                'produk',
                'produk.idproduk = keranjang.idproduk'
            )
            ->where(
                'keranjang.idpelanggan',
                $idpelanggan
            )
            ->where(
                'keranjang.statuskeranjang',
                'aktif'
            )
            ->findAll();

        foreach ($keranjang as &$item) {

            $hargaFinal = $item['harga'];

            if (
                !empty($item['diskon']) &&
                $item['diskon'] > 0
            ) {

                $hargaFinal =
                    $item['harga'] -
                    ($item['harga'] * $item['diskon'] / 100);
            }

            $item['harga_final'] = $hargaFinal;

            $item['subtotal'] =
                $hargaFinal * $item['qty'];
        }

        $data = [

            'keranjang' => $keranjang

        ];

        return view(
            'pelanggan/v_keranjang',
            $data
        );
    }

    public function checkout()
    {
        $idkeranjang = $this->request->getPost('idkeranjang');

        if (empty($idkeranjang)) {

            return redirect()->back()
                ->with(
                    'warning',
                    'Pilih minimal satu produk terlebih dahulu.'
                );
        }

        $modelKeranjang = new ModelKeranjang();

        $data['produk'] = $modelKeranjang
            ->select('
            keranjang.*,
            produk.namaproduk,
            produk.harga,
            produk.diskon,
            produk.foto
        ')
            ->join(
                'produk',
                'produk.idproduk = keranjang.idproduk'
            )
            ->whereIn(
                'keranjang.idkeranjang',
                $idkeranjang
            )
            ->findAll();

        foreach ($data['produk'] as &$item) {

            $hargaFinal =
                $item['harga'] -
                ($item['harga'] * $item['diskon'] / 100);

            $item['harga_final'] = $hargaFinal;

            $item['subtotal'] =
                $hargaFinal * $item['qty'];
        }

        $data['idkeranjang'] = $idkeranjang;

        return view(
            'pelanggan/v_checkout',
            $data
        );
    }

    public function simpanCheckout()
    {
        $db = \Config\Database::connect();

        $db->transBegin();

        try {

            $modelPesanan = new ModelPesanan();
            $modelDetail = new ModelDetailPesanan();
            $modelKeranjang = new ModelKeranjang();
            $modelPelanggan = new ModelPelanggan();

            $iduser = session()->get('iduser');

            $pelanggan = $modelPelanggan
                ->where('iduser', $iduser)
                ->first();

            $idpelanggan = $pelanggan['idpelanggan'];

            $idkeranjang =
                $this->request->getPost('idkeranjang');

            $keranjang = $modelKeranjang
                ->join(
                    'produk',
                    'produk.idproduk = keranjang.idproduk'
                )
                ->whereIn(
                    'keranjang.idkeranjang',
                    $idkeranjang
                )
                ->findAll();

            $total = 0;

            foreach ($keranjang as $item) {

                $hargaFinal =
                    $item['harga'] -
                    ($item['harga'] * $item['diskon'] / 100);

                $total +=
                    $hargaFinal * $item['qty'];
            }

            $idpesanan =
                $modelPesanan->generateId();

            $modelPesanan->insert([

                'idpesanan' => $idpesanan,

                'idpelanggan' => $idpelanggan,

                'tanggalpesanan' => date('Y-m-d'),

                'total' => $total,

                'estimasiwaktu' => null,

                'statuspesanan' => 'menunggu_konfirmasi'
            ]);

            foreach ($keranjang as $item) {

                $hargaFinal =
                    $item['harga'] -
                    ($item['harga'] * $item['diskon'] / 100);

                $subtotal =
                    $hargaFinal * $item['qty'];

                $modelDetail->insert([

                    'idpesanan' => $idpesanan,

                    'idproduk' => $item['idproduk'],

                    'qty' => $item['qty'],

                    'harga' => $item['harga'],

                    'diskon' => $item['diskon'],

                    'subtotal' => $subtotal
                ]);

                $modelKeranjang->update(
                    $item['idkeranjang'],
                    [
                        'statuskeranjang' => 'checkout'
                    ]
                );
            }

            $db->transCommit();

            return redirect()
                ->to('/pesananpelanggan')
                ->with(
                    'success',
                    'Pesanan berhasil dibuat.'
                );
        } catch (\Exception $e) {

            $db->transRollback();

            return redirect()->back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }

    public function hapusKeranjang($idkeranjang)
    {
        $modelKeranjang = new ModelKeranjang();
        // =========================
        // 1. CEK DATA PESANAN
        // =========================
        $idkeranjang = $modelKeranjang->find($idkeranjang);

        if (!$idkeranjang) {
            return redirect()->to('keranjang')
                ->with('error', 'Data keranjang tidak ditemukan');
        }

        // =========================
        // 3. HAPUS PESANAN UTAMA
        // =========================
        $modelKeranjang->delete($idkeranjang);

        return redirect()->to('keranjang')
            ->with('success', 'Data berhasil dihapus');
    }

    public function tambahqty($idkeranjang)
    {
        $model = new ModelKeranjang();

        $data = $model->find($idkeranjang);

        $model->update($idkeranjang, [
            'qty' => $data['qty'] + 1
        ]);

        return redirect()->back();
    }

    public function kurangqty($idkeranjang)
    {
        $model = new ModelKeranjang();

        $data = $model->find($idkeranjang);

        if ($data['qty'] > 1) {

            $model->update($idkeranjang, [
                'qty' => $data['qty'] - 1
            ]);
        }

        return redirect()->back();
    }

}
