<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPelanggan;
use App\Models\ModelPengguna;

class Pelanggan extends BaseController
{
    public function index()
    {
        $model = new ModelPelanggan();

        $data = [
            'pelanggan' => $model->findAll()
        ];

        return view('datamaster/v_datapelanggan', $data);
    }
    public function tambahdata()
    {
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();

        $data = [
            'iduser' => $modelPengguna->generateId(),
            'idpelanggan' => $modelPelanggan->generateId()
        ];

        return view('datamaster/tambahpelanggan', $data);
    }

    public function simpan()
    {
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();

        $rules = [
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'label' => 'Email',
                'errors' => [
                    'required' => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email sudah digunakan.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'label' => 'Username',
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi',
                    'matches' => 'Konfirmasi password tidak sesuai'
                ]
            ],
            'namapelanggan' => [
                'rules' => 'required'
            ],
            'alamat' => [
                'rules' => 'required'
            ],
            'nohp' => [
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules)) {
            dd($this->validator->getErrors());

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Simpan ke tabel user
        $dataUser = [
            'iduser' => $this->request->getPost('iduser'),
            'namauser' => $this->request->getPost('namapelanggan'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role' => 'pelanggan',
            'status' => $this->request->getPost('status')
        ];

        $modelPengguna->insert($dataUser);

        // Simpan ke tabel pelanggan
        $dataPelanggan = [
            'idpelanggan' => $this->request->getPost('idpelanggan'),
            'iduser' => $this->request->getPost('iduser'),
            'namapelanggan' => $this->request->getPost('namapelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')
        ];
        $modelPelanggan->insert($dataPelanggan);
        session()->setFlashdata(
            'success',
            'Data pelanggan berhasil ditambahkan'
        );

        return redirect()->to('/datapelanggan');
    }

    public function edit($idpelanggan, $iduser)
    {
        $modelPelanggan = new ModelPelanggan();
        $modelPengguna = new ModelPengguna();

        $pelanggan = $modelPelanggan->find($idpelanggan);
        $user = $modelPengguna->find($iduser);

        if (!$pelanggan || !$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data pelanggan tidak ditemukan'
            );
        }

        $data = [
            'pelanggan' => $pelanggan,
            'user' => $user
        ];

        return view('datamaster/editpelanggan', $data);
    }

    public function update()
    {
        // $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();

        // $iduser = $this->request->getPost('iduser');
        $idpelanggan = $this->request->getPost('idpelanggan');

        // Data user
        // $dataUser = [
        //     'namauser' => $this->request->getPost('namauser'),
        //     'email' => $this->request->getPost('email'),
        //     'username' => $this->request->getPost('username'),
        //     'status' => $this->request->getPost('status')
        // ];

        // // Jika password diisi, update password
        // if (!empty($this->request->getPost('password'))) {

        //     $dataUser['password'] = password_hash(
        //         $this->request->getPost('password'),
        //         PASSWORD_DEFAULT
        //     );
        // }

        // Update tabel user
        // $modelPengguna->update($iduser, $dataUser);

        // Data pelanggan
        $dataPelanggan = [
            'namapelanggan' => $this->request->getPost('namapelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')
        ];

        // Update tabel pelanggan
        $modelPelanggan->update($idpelanggan, $dataPelanggan);

        session()->setFlashdata(
            'success',
            'Data pelanggan berhasil diperbarui'
        );

        return redirect()->to('/datapelanggan');
    }

    public function hapus($idpelanggan)
    {
        $modelPelanggan = new ModelPelanggan();
        $modelPengguna = new ModelPengguna();

        // Cari data pelanggan
        $pelanggan = $modelPelanggan->find($idpelanggan);

        if (!$pelanggan) {

            session()->setFlashdata(
                'error',
                'Data pelanggan tidak ditemukan'
            );

            return redirect()->to('/datapelanggan');
        }

        // Ambil iduser dari pelanggan
        $iduser = $pelanggan['iduser'];

        // Hapus pelanggan
        $modelPelanggan->delete($idpelanggan);

        // Hapus user
        $modelPengguna->delete($iduser);

        session()->setFlashdata(
            'success',
            'Data pelanggan berhasil dihapus'
        );

        return redirect()->to('/datapelanggan');
    }
}
