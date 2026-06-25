<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPesanan;
use App\Models\ModelDetailPesanan;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelPelanggan;
use App\Models\ModelPembayaran;

class PesananController extends BaseController
{
    public function index()
    {
        $modelPesanan = new ModelPesanan();
        $modelKategori = new ModelKategori();
        $modelProduk = new ModelProduk();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'pesanan' => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll(),
            'pelanggan' => $modelPelanggan->findAll()
        ];

        return view('datatransaksi/v_datapesanan', $data);
    }

    public function tambahdata()
    {
        $modelPesanan = new ModelPesanan();
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'pesanan' => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll(),
            'pelanggan' => $modelPelanggan->findAll(),
            'idpesanan' => $modelPesanan->generateId()
        ];

        return view('datatransaksi/tambahpesanan', $data);
    }

    public function simpan()
    {
        $modelPesanan = new ModelPesanan();
        $modelDetailPesanan = new ModelDetailPesanan();

        // Validasi pelanggan
        if (empty($this->request->getPost('idpelanggan'))) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Pilih pelanggan terlebih dahulu'
                );
        }

        // Validasi produk
        if (empty($this->request->getPost('idproduk'))) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Minimal 1 produk harus dipilih'
                );
        }

        $idpesanan = $this->request->getPost('idpesanan');

        $dataPesanan = [
            'idpesanan'      => $idpesanan,
            'idpelanggan'    => $this->request->getPost('idpelanggan'),
            'tanggalpesanan' => $this->request->getPost('tanggalpesanan'),
            'totalharga'     => $this->request->getPost('totalharga'),
            'statuspesanan'  => $this->request->getPost('statuspesanan'),
            'estimasiwaktu'  => $this->request->getPost('estimasiwaktu')
        ];

        // ==========================
        // SIMPAN PESANAN
        // ==========================

        $modelPesanan->insert($dataPesanan);

        if (!empty($modelPesanan->errors())) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menyimpan data pesanan'
                );
        }

        // ==========================
        // SIMPAN DETAIL PESANAN
        // ==========================

        $idproduk = $this->request->getPost('idproduk');
        $harga = $this->request->getPost('harga');
        $diskon = $this->request->getPost('diskon');
        $qty = $this->request->getPost('qty');
        $subtotal = $this->request->getPost('subtotal');

        foreach ($idproduk as $key => $value) {

            $dataDetail = [

                'idpesanan' => $idpesanan,
                'idproduk'  => $idproduk[$key],
                'qty'       => $qty[$key],
                'harga'     => $harga[$key],
                'diskon'     => $diskon[$key],
                'subtotal'  => $subtotal[$key]

            ];

            $modelDetailPesanan->insert($dataDetail);

            if (!empty($modelDetailPesanan->errors())) {

                return redirect()->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Gagal menyimpan detail pesanan'
                    );
            }
        }

        session()->setFlashdata(
            'success',
            'Data pesanan berhasil ditambahkan'
        );

        return redirect()->to('/datapesanan');
    }

    public function updateStatus()
    {
        $model = new ModelPesanan();

        $idpesanan = $this->request->getPost('idpesanan');
        $status = $this->request->getPost('statuspesanan');

        $model->update(
            $idpesanan,
            [
                'statuspesanan' => $status
            ]
        );

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Status pesanan berhasil diperbarui'
        ]);
    }

    public function edit($idpesanan)
    {
        $modelPesanan = new ModelPesanan();
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan = new ModelPelanggan();

        // =========================
        // 1. AMBIL PESANAN + PELANGGAN (JOIN)
        // =========================
        $pesanan = $modelPesanan
            ->select('pesanan.*, pelanggan.namapelanggan, pelanggan.nohp, pelanggan.alamat')
            ->join('pelanggan', 'pelanggan.idpelanggan = pesanan.idpelanggan')
            ->where('pesanan.idpesanan', $idpesanan)
            ->first();

        if (!$pesanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data pesanan tidak ditemukan'
            );
        }

        // =========================
        // 2. AMBIL DETAIL PESANAN + JOIN PRODUK (INI YANG FIX NAMAPRODUK)
        // =========================
        $detailpesanan = $modelDetailPesanan
            ->select('detail_pesanan.*, produk.namaproduk')
            ->join('produk', 'produk.idproduk = detail_pesanan.idproduk')
            ->where('detail_pesanan.idpesanan', $idpesanan)
            ->findAll();

        // =========================
        // 3. DATA UNTUK MODAL
        // =========================
        $data = [
            'pesanan' => $pesanan,
            'pelanggan' => $modelPelanggan->findAll(),
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll(),
            'detailpesanan' => $detailpesanan
        ];

        return view('datatransaksi/editpesanan', $data);
    }

    public function update()
    {
        $modelPesanan = new ModelPesanan();
        $modelDetailPesanan = new ModelDetailPesanan();

        $idpesanan = $this->request->getPost('idpesanan');

        // =========================
        // 1. UPDATE HEADER PESANAN
        // =========================
        $dataPesanan = [
            'idpelanggan'     => $this->request->getPost('idpelanggan'),
            'tanggalpesanan'  => $this->request->getPost('tanggalpesanan'),
            'statuspesanan'   => $this->request->getPost('statuspesanan'),
            'totalharga'      => $this->request->getPost('totalharga'),
            'estimasiwaktu'      => $this->request->getPost('estimasiwaktu')
        ];

        $modelPesanan->update($idpesanan, $dataPesanan);

        // =========================
        // 2. HAPUS DETAIL LAMA
        // (biar tidak dobel data)
        // =========================
        $modelDetailPesanan
            ->where('idpesanan', $idpesanan)
            ->delete();

        // =========================
        // 3. AMBIL DATA DETAIL BARU DARI FORM
        // =========================
        $idproduk  = $this->request->getPost('idproduk');
        $harga     = $this->request->getPost('harga');
        $diskon     = $this->request->getPost('diskon');
        $qty       = $this->request->getPost('qty');
        $subtotal  = $this->request->getPost('subtotal');

        // =========================
        // 4. INSERT DETAIL ULANG
        // =========================
        if ($idproduk) {
            for ($i = 0; $i < count($idproduk); $i++) {

                $modelDetailPesanan->insert([
                    'idpesanan' => $idpesanan,
                    'idproduk'  => $idproduk[$i],
                    'harga'     => $harga[$i],
                    'diskon'     => $diskon[$i],
                    'qty'       => $qty[$i],
                    'subtotal'  => $subtotal[$i],
                ]);
            }
        }

        return redirect()->to('datapesanan')->with('success', 'Pesanan berhasil diupdate');
    }

    public function hapus($idpesanan)
    {
        $modelPesanan = new ModelPesanan();
        $modelDetailPesanan = new ModelDetailPesanan();

        // =========================
        // 1. CEK DATA PESANAN
        // =========================
        $pesanan = $modelPesanan->find($idpesanan);

        if (!$pesanan) {
            return redirect()->to('datapesanan')
                ->with('error', 'Data pesanan tidak ditemukan');
        }

        // =========================
        // 2. HAPUS DETAIL PESANAN TERLEBIH DAHULU
        // =========================
        $modelDetailPesanan
            ->where('idpesanan', $idpesanan)
            ->delete();

        // =========================
        // 3. HAPUS PESANAN UTAMA
        // =========================
        $modelPesanan->delete($idpesanan);

        return redirect()->to('datapesanan')
            ->with('success', 'Pesanan berhasil dihapus');
    }

    public function pesananpelanggan()
    {
        $modelPelanggan = new ModelPelanggan();
        $modelPesanan = new ModelPesanan();
        $modelDetail = new ModelDetailPesanan();
        $modelProduk = new ModelProduk();
        $modelPembayaran = new ModelPembayaran();

        $iduser = session()->get('iduser');

        if (!$iduser) {
            return redirect()->to('/login');
        }

        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        if (!$pelanggan) {
            return redirect()->back()
                ->with('error', 'Data pelanggan tidak ditemukan');
        }

        $pesanan = $modelPesanan
            ->where('idpelanggan', $pelanggan['idpelanggan'])
            ->orderBy('tanggalpesanan', 'DESC')
            ->findAll();

        foreach ($pesanan as &$row) {

            $detail = $modelDetail
                ->where('idpesanan', $row['idpesanan'])
                ->findAll();

            foreach ($detail as &$item) {

                $produk = $modelProduk
                    ->where('idproduk', $item['idproduk'])
                    ->first();

                $item['namaproduk'] =
                    $produk['namaproduk'] ?? '-';

                $item['foto'] =
                    $produk['foto'] ?? '';

                $item['subtotal'] =
                    ($item['harga'] - $item['diskon'])
                    * $item['qty'];
            }

            $row['detail'] = $detail;

            // ==========================
            // DATA PEMBAYARAN
            // ==========================

            $pembayaran = $modelPembayaran
                ->where('idpesanan', $row['idpesanan'])
                ->findAll();

            $row['sudah_dp'] = false;
            $row['sudah_lunas'] = false;
            $row['jenis_pembayaran_terakhir'] = null;

            foreach ($pembayaran as $bayar) {

                if (
                    $bayar['jenispembayaran'] == 'DP' &&
                    $bayar['statuspembayaran'] == 'valid'
                ) {
                    $row['sudah_dp'] = true;
                    $row['jenis_pembayaran_terakhir'] = 'DP';
                }

                if (
                    $bayar['jenispembayaran'] == 'Full Payment' &&
                    $bayar['statuspembayaran'] == 'valid'
                ) {
                    $row['sudah_lunas'] = true;
                    $row['jenis_pembayaran_terakhir'] = 'Full Payment';
                }

                if (
                    $bayar['jenispembayaran'] == 'Pelunasan' &&
                    $bayar['statuspembayaran'] == 'valid'
                ) {
                    $row['sudah_lunas'] = true;
                    $row['jenis_pembayaran_terakhir'] = 'Pelunasan';
                }
            }
        }

        return view(
            'pelanggan/v_pesananpelanggan',
            [
                'pesanan' => $pesanan
            ]
        );
    }

    public function pesananbatal($idpesanan)
    {
        $modelPesanan = new ModelPesanan();

        $modelPesanan->update($idpesanan, [
            'statuspesanan' => 'batal'
        ]);

        session()->setFlashdata(
            'success',
            'Anda telah membatalkan pengajuan ini.'
        );

        return redirect()->to('/pesananpelanggan');
    }
}
