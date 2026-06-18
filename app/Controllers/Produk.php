<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;

class Produk extends BaseController
{
    public function index()
    {
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();

        $data = [
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll()
        ];

        return view('datamaster/v_dataproduk', $data);
    }

    public function tambahdata()
    {
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();

        $data = [
            'produk' => $modelProduk->findAll(),
            'kategori' => $modelKategori->findAll(),
            'idproduk' => $modelProduk->generateId()
        ];

        return view('datamaster/tambahproduk', $data);
    }

    public function simpan()
    {
        $model = new ModelProduk();

        $rules = [
            'namaproduk' => 'required',
            'idkategori' => 'required',
            'jenisproduk' => 'required',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'detailproduk' => 'required',
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Foto produk wajib diupload',
                    'max_size' => 'Ukuran foto maksimal 2 MB',
                    'is_image' => 'File harus berupa gambar'
                ]
            ]
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Upload Foto
        $foto = $this->request->getFile('foto');

        $namaFoto = $foto->getRandomName();

        $foto->move(
            FCPATH . 'storage/fotoproduk',
            $namaFoto
        );

        // Simpan ke database
        $data = [
            'idproduk'      => $this->request->getPost('idproduk'),
            'idkategori'    => $this->request->getPost('idkategori'),
            'namaproduk'    => $this->request->getPost('namaproduk'),
            'jenisproduk'   => $this->request->getPost('jenisproduk'),
            'harga'         => $this->request->getPost('harga'),
            'diskon'         => $this->request->getPost('diskon'),
            'detailproduk'  => $this->request->getPost('detailproduk'),
            'foto'          => $namaFoto,
            'statusproduk'  => $this->request->getPost('statusproduk')
        ];

        $model->insert($data);

        session()->setFlashdata(
            'success',
            'Data produk berhasil ditambahkan'
        );

        return redirect()->to('/dataproduk');
    }

    public function edit($idproduk)
    {
        $modelProduk = new ModelProduk();
        $modelKategori = new ModelKategori();

        $produk = $modelProduk->find($idproduk);

        if (!$idproduk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data produk tidak ditemukan'
            );
        }

        $data = [
            'produk' => $produk,
            'kategori' => $modelKategori->findAll()
        ];

        return view('datamaster/editproduk', $data);
    }

    public function update()
    {
        $model = new ModelProduk();

        $idproduk = $this->request->getPost('idproduk');

        $produk = $model->find($idproduk);

        if (!$produk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data produk tidak ditemukan'
            );
        }

        $foto = $this->request->getFile('foto');

        // Jika tidak upload foto baru
        if ($foto->getError() == 4) {

            $namaFoto = $produk['foto'];
        } else {

            // Generate nama foto baru
            $namaFoto = $foto->getRandomName();

            // Upload foto baru
            $foto->move(
                FCPATH . 'storage/fotoproduk',
                $namaFoto
            );

            // Hapus foto lama jika ada
            if (
                !empty($produk['foto']) &&
                file_exists(
                    FCPATH . 'storage/fotoproduk/' . $produk['foto']
                )
            ) {
                unlink(
                    FCPATH . 'storage/fotoproduk/' . $produk['foto']
                );
            }
        }

        $data = [
            'idkategori'    => $this->request->getPost('idkategori'),
            'namaproduk'    => $this->request->getPost('namaproduk'),
            'jenisproduk'   => $this->request->getPost('jenisproduk'),
            'harga'         => $this->request->getPost('harga'),
            'diskon'         => $this->request->getPost('diskon'),
            'detailproduk'  => $this->request->getPost('detailproduk'),
            'foto'          => $namaFoto,
            'statusproduk'  => $this->request->getPost('statusproduk')
        ];

        $model->update($idproduk, $data);

        session()->setFlashdata(
            'success',
            'Data produk berhasil diperbarui'
        );

        return redirect()->to('/dataproduk');
    }

    public function hapus($idproduk)
    {
        $model = new ModelProduk();

        $produk = $model->find($idproduk);

        if (!$produk) {

            session()->setFlashdata(
                'error',
                'Data produk tidak ditemukan'
            );

            return redirect()->to('/dataproduk');
        }

        // Hapus file foto
        if (
            !empty($produk['foto']) &&
            file_exists(
                FCPATH . 'storage/fotoproduk/' . $produk['foto']
            )
        ) {

            unlink(
                FCPATH . 'storage/fotoproduk/' . $produk['foto']
            );
        }

        // Hapus data produk
        $model->delete($idproduk);

        session()->setFlashdata(
            'success',
            'Data produk berhasil dihapus'
        );

        return redirect()->to('/dataproduk');
    }
}
