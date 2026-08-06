<?php

namespace App\Controllers;

use App\Models\ModelPengguna;
use App\Models\ModelPelanggan;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelPesanan;
use App\Models\ModelDetailPesanan;
use App\Models\ModelpengajuanCustom;
use App\Models\ModelDetailPengajuan;
use App\Models\ModelPembayaran;



class Layout extends BaseController
{
    public function index(): string
    {
        $modelProduk = new ModelProduk();
        $modelPengguna = new ModelPengguna();

        $iduser = session()->get('iduser');

        $data = [
            'produk' => $modelProduk
                ->where('jenisproduk', 'katalog')
                ->where('statusproduk', 'aktif')
                ->findAll(8),
            'user' => $modelPengguna->find($iduser)
        ];

        return view('layout/landingpage', $data);
    }
    public function dashboard(): string
    {
        return view('dashboard/dashboard');
    }
    public function login(): string
    {
        return view('layout/login');
    }
    public function registrasi(): string
    {
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'iduser' => $modelPengguna->generateId(),
            'idpelanggan' => $modelPelanggan->generateId()
        ];

        return view('layout/registrasi', $data);
    }
    public function homepage(): string
    {
        $modelProduk = new ModelProduk();
        $modelPengguna = new ModelPengguna();

        $iduser = session()->get('iduser');

        $data = [
            'produk' => $modelProduk
                ->where('jenisproduk', 'katalog')
                ->where('statusproduk', 'aktif')
                ->findAll(8),
            'user' => $modelPengguna->find($iduser)
        ];
        session()->keepFlashdata('success');

        return view('pelanggan/homepage', $data);
    }

    public function loadMore()
    {
        $offset = $this->request->getGet('offset');

        $model = new ModelProduk();

        $produk = $model
            ->where('jenisproduk', 'katalog')
            ->where('statusproduk', 'aktif')
            ->findAll(4, $offset);

        return view('pelanggan/load_more_produk', [
            'produk' => $produk
        ]);
    }
    public function katalog(): string
    {
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();
        $iduser = session()->get('iduser');


        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        $data = [
            'produk' => $modelProduk
                ->where('jenisproduk', 'katalog')
                ->where('statusproduk', 'aktif')
                ->findAll(),
            'kategori' => $modelKategori->findAll(),
            'user' => $modelPengguna->find($iduser),
            'pelanggan' => $pelanggan
        ];

        return view('pelanggan/katalogproduk', $data);
    }

    public function about(): string
    {
        return view('layout/about');
    }
    public function contact(): string
    {
        return view('layout/contact');
    }

    public function dashboard_admin()
    {
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();
        $modelPesanan = new ModelPesanan();
        $modelDetailPesanan = new ModelDetailPesanan();
        $modelPengajuanCustom = new ModelPengajuanCustom();
        $modelDetailPengajuan = new ModelDetailPengajuan();
        $modelPembayaran = new ModelPembayaran();

        $iduser = session()->get('iduser');

        // ======================
        // DATA USER LOGIN
        // ======================
        $user = $modelPengguna->find($iduser);

        // ======================
        // CARD STATISTIK
        // ======================
        $totalPelanggan = $modelPelanggan->countAllResults();

        $totalProduk = $modelProduk->countAllResults();

        $totalKategori = $modelKategori->countAllResults();

        $totalPesanan = $modelPesanan->countAllResults();

        $totalPengajuan = $modelPengajuanCustom->countAllResults();

        $totalPembayaran = $modelPembayaran->countAllResults();

        // ======================
        // PRODUK AKTIF
        // ======================
        $produkAktif = $modelProduk
            ->where('statusproduk', 'aktif')
            ->countAllResults();

        // ======================
        // TOTAL PENJUALAN
        // ======================
        $totalPenjualan = $modelPesanan
            ->selectSum('total')
            ->first()['total'] ?? 0;

        // ======================
        // STATUS PESANAN
        // ======================
        $statusPesanan = [
            'menunggu' => $modelPesanan->where('statuspesanan', 'menunggu_konfirmasi')->countAllResults(),
            'konfirmasi' => $modelPesanan->where('statuspesanan', 'dikonfirmasi')->countAllResults(),
            'produksi' => $modelPesanan->where('statuspesanan', 'proses_produksi')->countAllResults(),
            'pengantaran' => $modelPesanan->where('statuspesanan', 'proses_pengantaran')->countAllResults(),
            'selesai' => $modelPesanan->where('statuspesanan', 'selesai')->countAllResults(),
        ];

        // ======================
        // GRAFIK PENJUALAN
        // ======================
        $grafikPenjualan = [];

        for ($i = 1; $i <= 12; $i++) {

            $hasil = $modelPesanan
                ->selectSum('total')
                ->where('MONTH(tanggalpesanan)', $i)
                ->where('YEAR(tanggalpesanan)', date('Y'))
                ->first();

            $grafikPenjualan[] = (float)($hasil['total'] ?? 0);
        }

        // ======================
        // PESANAN TERBARU
        // ======================
        $pesananTerbaru = $modelPesanan
            ->orderBy('tanggalpesanan', 'DESC')
            ->findAll(5);

        // ======================
        // PENGAJUAN CUSTOM TERBARU
        // ======================
        $pengajuanTerbaru = $modelPengajuanCustom
            ->orderBy('tanggalpengajuan', 'DESC')
            ->findAll(5);

        // ======================
        // PEMBAYARAN MENUNGGU
        // ======================
        $pembayaranMenunggu = $modelPembayaran
            ->where('statuspembayaran', 'menunggu')
            ->findAll(5);

        // ======================
        // REKAP PEMBAYARAN & PIUTANG
        // ======================

        $builder = $modelPesanan->builder();

        $builder->select("
    SUM(IFNULL(dp.total_penjualan,0)) AS total_penjualan,
    SUM(IFNULL(pb.total_bayar,0)) AS total_dibayar,
    SUM(IFNULL(dp.total_penjualan,0) - IFNULL(pb.total_bayar,0)) AS total_piutang
", false);


        // Total harga semua pesanan dari detail pesanan
        $builder->join("
(
    SELECT
        idpesanan,
        SUM(subtotal) AS total_penjualan
    FROM detail_pesanan
    GROUP BY idpesanan
) dp
", "dp.idpesanan = pesanan.idpesanan", "left", false);


        // Total pembayaran yang sudah valid
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


        $rekapPembayaran = $builder->get()->getRowArray();

        $totalSudahBayar = $rekapPembayaran['total_dibayar'] ?? 0;

        $totalPiutang = $rekapPembayaran['total_piutang'] ?? 0;

        // ======================
        // DATA KE VIEW
        // ======================
        $data = [

            'user' => $user,

            'totalPelanggan' => $totalPelanggan,
            'totalProduk' => $totalProduk,
            'totalKategori' => $totalKategori,
            'totalPesanan' => $totalPesanan,
            'totalPengajuan' => $totalPengajuan,
            'totalPembayaran' => $totalPembayaran,

            'produkAktif' => $produkAktif,
            'totalPenjualan' => $totalPenjualan,

            'statusPesanan' => $statusPesanan,

            'grafikPenjualan' => $grafikPenjualan,

            'pesananTerbaru' => $pesananTerbaru,
            'pengajuanTerbaru' => $pengajuanTerbaru,
            'pembayaranMenunggu' => $pembayaranMenunggu,
            'totalSudahBayar' => $totalSudahBayar,
            'totalPiutang' => $totalPiutang,

        ];

        return view('dashboard/v_dashboard', $data);
    }

    public function profile()
    {
        $modelPelanggan = new ModelPelanggan();
        $modelPesanan   = new ModelPesanan();
        $modelPembayaran = new ModelPembayaran();

        $iduser = session()->get('iduser');

        $pelanggan = $modelPelanggan
            ->select('pelanggan.*, user.namauser,user.username,user.email,user.status')
            ->join('user', 'user.iduser=pelanggan.iduser')
            ->where('pelanggan.iduser', $iduser)
            ->first();

        $idpelanggan = $pelanggan['idpelanggan'];

        $data = [
            'pelanggan' => $pelanggan,

            'totalPesanan' => $modelPesanan
                ->where('idpelanggan', $idpelanggan)
                ->countAllResults(),

            'pesananSelesai' => $modelPesanan
                ->where('idpelanggan', $idpelanggan)
                ->where('statuspesanan', 'selesai')
                ->countAllResults(),

            'menungguKonfirmasi' => $modelPesanan
                ->where('idpelanggan', $idpelanggan)
                ->where('statuspesanan', 'menunggu_konfirmasi')
                ->countAllResults(),
            'pembayaranMenunggu' => $modelPesanan
                ->join('pembayaran', 'pembayaran.idpesanan = pesanan.idpesanan', 'left')
                ->where('pesanan.idpelanggan', $idpelanggan)
                ->where('pembayaran.idpesanan', null)
                ->countAllResults(),
            'prosesProduksi' => $modelPesanan
                ->where('idpelanggan', $idpelanggan)
                ->where('statuspesanan', 'proses_produksi')
                ->countAllResults(),

            'prosesPengantaran' => $modelPesanan
                ->where('idpelanggan', $idpelanggan)
                ->where('statuspesanan', 'proses_pengantaran')
                ->countAllResults(),
        ];

        return view('pelanggan/v_profile', $data);
    }

    public function edit_pelanggan()
    {
        $modelPelanggan = new ModelPelanggan();
        $modelPengguna = new ModelPengguna();

        $iduser = session()->get('iduser');

        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        $data = [
            'pelanggan' => $pelanggan,
            'user' => $modelPengguna->find($iduser)
        ];

        return view('pelanggan/editprofile', $data);
    }

    public function simpan_edit_pelanggan()
    {
        $modelPelanggan = new ModelPelanggan();
        $modelPengguna = new ModelPengguna();

        $iduser = session()->get('iduser');

        $pelanggan = $modelPelanggan
            ->where('iduser', $iduser)
            ->first();

        $dataPelanggan = [
            'namapelanggan' => $this->request->getPost('namapelanggan'),
            'nohp' => $this->request->getPost('nohp'),
            'alamat' => $this->request->getPost('alamat')
        ];

        $dataUser = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email')
        ];

        // Update data pelanggan
        $modelPelanggan
            ->where('idpelanggan', $pelanggan['idpelanggan'])
            ->set($dataPelanggan)
            ->update();

        // Update data user
        $modelPengguna
            ->where('iduser', $iduser)
            ->set($dataUser)
            ->update();

        return redirect()->to('/profil')
            ->with('msg', 'Data telah berhasil diperbaruhi.')
            ->with('title', 'Berhasil')
            ->with('icon', 'success');
    }
}
