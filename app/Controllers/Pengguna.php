<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPengguna;

class Pengguna extends BaseController
{
    public function index()
    {
        $model = new ModelPengguna();

        $data = [
            'user' => $model->findAll()
        ];

        return view('datamaster/v_datapengguna', $data);
    }
    public function tambahdata()
    {
        $model = new ModelPengguna();

        $data = [
            'iduser' => $model->generateId()
        ];

        return view('datamaster/tambahpengguna', $data);
    }

    public function simpan()
    {
        $model = new ModelPengguna();

        $rules = [
            'namauser' => 'required',
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
                'label' => 'Password',
                'errors' => [
                    'required' => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ],
            'role' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'iduser'    => $this->request->getPost('iduser'),
            'namauser'  => $this->request->getPost('namauser'),
            'email'     => $this->request->getPost('email'),
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'      => $this->request->getPost('role'),
            'status'    => $this->request->getPost('status')
        ];

        $model->insert($data);

        session()->setFlashdata(
            'success',
            'Data pengguna berhasil ditambahkan'
        );

        return redirect()->to('/datapengguna');
    }

    public function edit($iduser)
    {
        $model = new ModelPengguna();

        $user = $model->find($iduser);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data pengguna tidak ditemukan'
            );
        }

        $data = [
            'user' => $user
        ];

        return view('datamaster/editpengguna', $data);
    }

    public function update()
    {
        $model = new ModelPengguna();
        $iduser = $this->request->getPost('iduser');

        $data = [
            'namauser' => $this->request->getPost('namauser'),
            'email'    => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'role'     => $this->request->getPost('role'),
            'status'   => $this->request->getPost('status'),
        ];

        $password = $this->request->getPost('password');
        $konfirmasi = $this->request->getPost('konfirmasi_password');

        // Jika password diisi
        if (!empty($password)) {

            if ($password != $konfirmasi) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Konfirmasi password tidak sesuai');
            }

            $data['password'] = password_hash(
                $password,
                PASSWORD_DEFAULT
            );
        }

        $model->update($iduser, $data);

        return redirect()->to(base_url('datapengguna'))
            ->with('success', 'Data pengguna berhasil diperbarui');
    }

    public function hapus($iduser)
    {
        $model = new ModelPengguna();

        $user = $model->find($iduser);

        if (!$user) {
            return redirect()->to(base_url('datapengguna'))
                ->with('error', 'Data pengguna tidak ditemukan');
        }

        $model->delete($iduser);

        return redirect()->to(base_url('datapengguna'))
            ->with('success', 'Data pengguna berhasil dihapus');
    }
}
