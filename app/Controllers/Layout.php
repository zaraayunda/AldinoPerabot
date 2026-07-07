<?php

namespace App\Controllers;

use App\Models\ModelKategori;
use App\Models\ModelPelanggan;
use App\Models\ModelPengguna;
use App\Models\ModelProduk;

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
}
