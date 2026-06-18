<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new ModelKategori();

        $data = [
            'kategori' => $model->findAll()
        ];

        return view('datamaster/v_datakategori', $data);
    }
    public function tambahdata()
    {
        $model = new ModelKategori();

        $data = [
            'idkategori' => $model->generateId()
        ];

        return view('datamaster/tambahkategori', $data);
    }

    public function simpan()
    {
        $model = new ModelKategori();

        $rules = [
            'namakategori' => 'required',
            'deskripsi' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }
        $data = [
            'idkategori'    => $this->request->getPost('idkategori'),
            'namakategori'  => $this->request->getPost('namakategori'),
            'deskripsi'     => $this->request->getPost('deskripsi')
        ];
        $model->insert($data);

        session()->setFlashdata(
            'success',
            'Data kategori berhasil ditambahkan'
        );

        return redirect()->to('/datakategori');
    }

    public function edit($idkategori)
    {
        $model = new ModelKategori();

        $kategori = $model->find($idkategori);

        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data kategori tidak ditemukan'
            );
        }

        $data = [
            'kategori' => $kategori
        ];

        return view('datamaster/editkategori', $data);
    }

    public function update()
    {
        $model = new ModelKategori();
        $idkategori = $this->request->getPost('idkategori');

        $data = [
            'namakategori' => $this->request->getPost('namakategori'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
        ];

        $model->update($idkategori, $data);

        return redirect()->to(base_url('datakategori'))
            ->with('success', 'Data kategori berhasil diperbarui');
    }

    public function hapus($idkategori)
    {
        $model = new ModelKategori();

        $kategori = $model->find($idkategori);

        if (!$kategori) {
            return redirect()->to(base_url('datakategori'))
                ->with('error', 'Data kategori tidak ditemukan');
        }

        $model->delete($idkategori);

        return redirect()->to(base_url('datakategori'))
            ->with('success', 'Data kategori berhasil dihapus');
    }
}
