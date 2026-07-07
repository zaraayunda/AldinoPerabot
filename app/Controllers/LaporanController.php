<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPengguna;
use App\Models\ModelPelanggan;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelPesanan;
use App\Models\ModelDetailPesanan;
use App\Models\ModelpengajuanCustom;
use App\Models\ModelDetailPengajuan;
use App\Models\ModelPembayaran;

class LaporanController extends BaseController
{
    public function laporanuser()
    {
        $model = new ModelPengguna();

        $data = [
            'user' => $model->findAll()
        ];
        return view('laporan/v_lapuser', $data);
    }

    public function cetaklapuser()
    {
        $model = new ModelPengguna();

        // Ambil parameter status dari URL
        $status = $this->request->getGet('status');

        // Filter data
        if ($status == 'aktif') {
            $user = $model->where('status', 'aktif')->findAll();
            $judul = 'Laporan Data Pengguna Aktif';
        } elseif ($status == 'nonaktif') {
            $user = $model->where('status', 'nonaktif')->findAll();
            $judul = 'Laporan Data Pengguna Nonaktif';
        } else {
            $user = $model->findAll();
            $judul = 'Laporan Data Pengguna';
        }

        $data = [
            'user' => $user,
            'judul' => $judul,
            'status' => $status
        ];

        return view('laporan/laporanuser', $data);
    }

    public function laporanpelanggan()
    {
        $model = new ModelPelanggan();

        $data = [
            'pelanggan' => $model->findAll()
        ];

        return view('laporan/v_lappelanggan', $data);
    }

    public function cetaklappelanggan()
    {
        $model = new ModelPelanggan();

        $data = [
            'pelanggan' => $model->findAll(),
            'judul' => 'Laporan Data Pelanggan'
        ];

        return view('laporan/laporanpelanggan', $data);
    }

    public function laporankategori()
    {
        $model = new ModelKategori();

        $data = [
            'kategori' => $model->findAll()
        ];

        return view('laporan/v_lapkategori', $data);
    }

    public function cetaklapkategori()
    {
        $model = new ModelKategori();

        $data = [
            'kategori' => $model->findAll(),
            'judul' => 'Laporan Data Kategori'
        ];

        return view('laporan/laporankategori', $data);
    }

    public function laporanproduk()
    {
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();

        $data = [
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll()
        ];

        return view('laporan/v_lapproduk', $data);
    }

    public function cetaklapproduk()
    {
        $model = new ModelProduk();
        $modelKategori = new ModelKategori();

        // Ambil parameter status dari URL
        $jenis = $this->request->getGet('jenisproduk');

        // Filter data
        if ($jenis == 'custom') {
            $produk = $model->where('jenisproduk', 'custom')->findAll();
            $judul = 'Laporan Data Produk Custom';
        } elseif ($jenis == 'katalog') {
            $produk = $model->where('jenisproduk', 'katalog')->findAll();
            $judul = 'Laporan Data Produk Katalog';
        } else {
            $produk = $model->findAll();
            $judul = 'Laporan Data Produk';
        }

        $data = [
            'produk' => $produk,
            'judul' => $judul,
            'jenis' => $jenis,
            'kategori' => $modelKategori->findAll()
        ];

        return view('laporan/laporanproduk', $data);
    }

    public function laporanpengajuancustom()
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'pengajuan' => $modelPengajuan->findAll(),
            'detailpengajuan' => $modelDetail->findAll(),
            'pelanggan' => $modelPelanggan->findAll()
        ];

        return view('laporan/v_lappengajuan', $data);
    }

    public function cetaklappengajuan()
    {
        $modelPengajuan = new ModelPengajuanCustom();
        $modelDetail = new ModelDetailPengajuan();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'pengajuan' => $modelPengajuan->findAll(),
            'detailpengajuan' => $modelDetail->findAll(),
            'pelanggan' => $modelPelanggan->findAll(),
            'judul' => 'Laporan Data Pengajuan Custom'
        ];

        return view('laporan/laporanpengajuan', $data);
    }

    public function laporanpesanan()
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

        return view('laporan/v_lappesanan', $data);
    }

    public function cetaklappesanan()
    {
        $modelPesanan       = new ModelPesanan();
        $modelKategori      = new ModelKategori();
        $modelProduk        = new ModelProduk();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan     = new ModelPelanggan();

        $jenis = $this->request->getGet('jenis');

        if ($jenis == 'harian') {

            $tanggal = $this->request->getGet('tanggalpesanan');

            $pesanan = $modelPesanan
                ->where('tanggalpesanan', $tanggal)
                ->findAll();

            $data = [
                'pesanan'       => $pesanan,
                'tanggalpesanan' => $tanggal,
                'detailpesanan' => $modelDetailPesanan->findAll(),
                'produk'        => $modelProduk->findAll(),
                'kategori'      => $modelKategori->findAll(),
                'pelanggan'     => $modelPelanggan->findAll()
            ];

            return view('laporan/laporanpesanan_harian', $data);
        } elseif ($jenis == 'bulanan') {

            $bulan = $this->request->getGet('bulanpesanan');

            $tahun = substr($bulan, 0, 4);
            $bln   = substr($bulan, 5, 2);

            $pesanan = $modelPesanan
                ->where("YEAR(tanggalpesanan)", $tahun)
                ->where("MONTH(tanggalpesanan)", $bln)
                ->findAll();

            $data = [
                'pesanan'       => $pesanan,
                'bulanpesanan'  => $bulan,
                'detailpesanan' => $modelDetailPesanan->findAll(),
                'produk'        => $modelProduk->findAll(),
                'kategori'      => $modelKategori->findAll(),
                'pelanggan'     => $modelPelanggan->findAll()
            ];

            return view('laporan/laporanpesanan_bulanan', $data);
        } elseif ($jenis == 'tahunan') {

            $tahun = $this->request->getGet('tahunpesanan');

            $builder = $modelPesanan->builder();

            $builder->select("MONTH(tanggalpesanan) AS bulan,COUNT(idpesanan) AS jumlah");

            $builder->where('YEAR(tanggalpesanan)', $tahun);
            $builder->groupBy('MONTH(tanggalpesanan)');
            $builder->orderBy('MONTH(tanggalpesanan)', 'ASC');

            $rekap = $builder->get()->getResultArray();

            $data = [
                'rekap' => $rekap,
                'periode' => $tahun
            ];

            return view('laporan/laporanpesanan_tahunan', $data);
        }

        $data = [
            'pesanan'       => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'produk'        => $modelProduk->findAll(),
            'kategori'      => $modelKategori->findAll(),
            'pelanggan'     => $modelPelanggan->findAll()
        ];

        return view('laporan/laporanpesanan', $data);
    }

    public function lapstatuspesanan()
    {
        //
    }
    public function laporanpenjualan()
    {
        $modelPesanan = new ModelPesanan();
        $modelKategori = new ModelKategori();
        $modelProduk = new ModelProduk();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan = new ModelPelanggan();
        $modelPembayaran = new ModelPembayaran();

        $data = [
            'pesanan' => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll(),
            'pelanggan' => $modelPelanggan->findAll(),
            'pembayaran' => $modelPembayaran->findAll()
        ];

        return view('laporan/v_lappenjualan', $data);
    }

    public function cetaklappenjualan()
    {
        $modelPesanan       = new ModelPesanan();
        $modelKategori      = new ModelKategori();
        $modelProduk        = new ModelProduk();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan     = new ModelPelanggan();
        $modelPembayaran = new ModelPembayaran();

        $jenis = $this->request->getGet('jenis');

        if ($jenis == 'harian') {

            $tanggal = $this->request->getGet('tanggalpesanan');

            $pesanan = $modelPesanan
                ->where('tanggalpesanan', $tanggal)
                ->findAll();

            $data = [
                'pesanan'       => $pesanan,
                'tanggalpesanan' => $tanggal,
                'detailpesanan' => $modelDetailPesanan->findAll(),
                'produk'        => $modelProduk->findAll(),
                'kategori'      => $modelKategori->findAll(),
                'pelanggan'     => $modelPelanggan->findAll(),
                'pembayaran' => $modelPembayaran->findAll()
            ];

            return view('laporan/laporanpenjualan_harian', $data);
        } elseif ($jenis == 'bulanan') {

            $bulan = $this->request->getGet('bulanpesanan');

            $tahun = substr($bulan, 0, 4);
            $bln   = substr($bulan, 5, 2);

            $pesanan = $modelPesanan
                ->where("YEAR(tanggalpesanan)", $tahun)
                ->where("MONTH(tanggalpesanan)", $bln)
                ->findAll();

            $data = [
                'pesanan'       => $pesanan,
                'bulanpesanan'  => $bulan,
                'detailpesanan' => $modelDetailPesanan->findAll(),
                'produk'        => $modelProduk->findAll(),
                'kategori'      => $modelKategori->findAll(),
                'pelanggan'     => $modelPelanggan->findAll(),
                'pembayaran' => $modelPembayaran->findAll()
            ];

            return view('laporan/laporanpenjualan_bulanan', $data);
        } elseif ($jenis == 'tahunan') {

            $tahun = $this->request->getGet('tahunpesanan');

            $builder = $modelPesanan->builder();

            $builder->select("
    MONTH(pesanan.tanggalpesanan) AS bulan,
    SUM(IFNULL(dp.total_penjualan,0)) AS penjualan,
    SUM(IFNULL(pb.total_bayar,0)) AS pembayaran,
    SUM(IFNULL(dp.total_penjualan,0) - IFNULL(pb.total_bayar,0)) AS piutang
", false);

            // Total penjualan tiap pesanan
            $builder->join("
(
    SELECT
        idpesanan,
        SUM(subtotal) AS total_penjualan
    FROM detail_pesanan
    GROUP BY idpesanan
) dp
", "dp.idpesanan = pesanan.idpesanan", "left", false);

            // Total pembayaran valid tiap pesanan
            $builder->join("
(
    SELECT
        idpesanan,
        SUM(jumlahbayar) AS total_bayar
    FROM pembayaran
    WHERE statuspembayaran='valid'
    GROUP BY idpesanan
) pb
", "pb.idpesanan = pesanan.idpesanan", "left", false);

            $builder->where('YEAR(pesanan.tanggalpesanan)', $tahun);

            $builder->groupBy('MONTH(pesanan.tanggalpesanan)');

            $builder->orderBy('MONTH(pesanan.tanggalpesanan)', 'ASC');

            $rekap = $builder->get()->getResultArray();

            $data = [
                'rekap'   => $rekap,
                'periode' => $tahun
            ];

            return view('laporan/laporanpenjualan_tahunan', $data);
        }

        $data = [
            'pesanan'       => $modelPesanan->findAll(),
            'detailpesanan' => $modelDetailPesanan->findAll(),
            'produk'        => $modelProduk->findAll(),
            'kategori'      => $modelKategori->findAll(),
            'pelanggan'     => $modelPelanggan->findAll(),
            'pembayaran' => $modelPembayaran->findAll()
        ];

        return view('laporan/laporanpenjualan', $data);
    }

    public function faktur($idpesanan)
    {
        $modelPesanan       = new ModelPesanan();
        $modelProduk        = new ModelProduk();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPelanggan     = new ModelPelanggan();
        $modelPembayaran    = new ModelPembayaran();

        // Ambil data pesanan
        $pesanan = $modelPesanan->find($idpesanan);

        if (!$pesanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Data pelanggan
        $pelanggan = $modelPelanggan->find($pesanan['idpelanggan']);

        // Detail pesanan
        $detail = $modelDetailPesanan
            ->where('idpesanan', $idpesanan)
            ->findAll();

        foreach ($detail as &$item) {

            $produk = $modelProduk->find($item['idproduk']);

            $item['namaproduk'] = $produk['namaproduk'] ?? '-';
        }

        // Riwayat pembayaran
        $pembayaran = $modelPembayaran
            ->where('idpesanan', $idpesanan)
            ->where('statuspembayaran', 'valid')
            ->orderBy('tanggalpembayaran', 'ASC')
            ->findAll();

        // Hitung total pembayaran
        $totalBayar = 0;

        foreach ($pembayaran as $bayar) {
            $totalBayar += $bayar['jumlahbayar'];
        }

        // Tambahkan ke array pesanan supaya gampang dipanggil di view
        $pesanan['total_bayar'] = $totalBayar;
        $pesanan['sisa'] = $pesanan['total'] - $totalBayar;

        $data = [
            'pesanan'    => $pesanan,
            'pelanggan'  => $pelanggan,
            'detail'     => $detail,
            'pembayaran' => $pembayaran
        ];

        return view('pelanggan/fakturpelanggan', $data);
    }
}
