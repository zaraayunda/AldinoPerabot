<?php

namespace App\Controllers;

use App\Models\ModelPengguna;
use App\Models\ModelPelanggan;

class Login extends BaseController
{
    public function ceklogin()
    {
        $session = session();
        $model = new ModelPengguna();
        $login = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Mendapatkan data user untuk level selain admin
        $cek = $model->ceklogin($login);
        if ($cek) {
            // Memeriksa apakah level user adalah 'admin'
            if ($cek['role'] === 'admin') {
                if ($cek['status'] === 'aktif') {
                    $pass = $cek['password'];
                    $verify_pass = password_verify($password, $pass);

                    if ($verify_pass) {
                        session()->set('iduser', $cek['iduser']);
                        session()->set('username', $cek['username']);
                        session()->set('email', $cek['email']);
                        session()->set('masuk', TRUE);
                        session()->set('role', $cek['role']);
                        return redirect()->to('/dashboard');
                    } else {
                        $session->setFlashdata('msg', 'Password Salah');
                        return redirect()->to('/login');
                    }
                } else {
                    $session->setFlashdata('msg', 'Akun terblokir');
                    return redirect()->to('/login');
                }
            }
            // Memeriksa level user selain 'admin' (seperti pelanggan)
            else if ($cek['role'] === 'pimpinan') {
                if ($cek['status'] === 'aktif') {
                    $pass = $cek['password'];
                    $verify_pass = password_verify($password, $pass);

                    if ($verify_pass) {
                        // Menyiapkan data untuk pelanggan
                        // $data['data'] = $model->getUser()->getResultArray();
                        session()->set('iduser', $cek['iduser']);
                        session()->set('username', $cek['username']);
                        session()->set('email', $cek['email']);
                        session()->set('masuk', TRUE);
                        session()->set('role', $cek['role']);
                        return redirect()->to('/dashboard');
                    } else {
                        $session->setFlashdata('msg', 'Password Salah');
                        return redirect()->to('/login');
                    }
                } else {
                    $session->setFlashdata('msg', 'Akun terblokir');
                    return redirect()->to('/login');
                }
            } else {
                if ($cek['status'] === 'aktif') {
                    $pass = $cek['password'];
                    $verify_pass = password_verify($password, $pass);

                    if ($verify_pass) {
                        // Menyiapkan data untuk pelanggan
                        // $data['data'] = $model->getUser()->getResultArray();
                        session()->set('iduser', $cek['iduser']);
                        session()->set('username', $cek['username']);
                        session()->set('email', $cek['email']);
                        session()->set('masuk', TRUE);
                        session()->set('role', $cek['role']);
                        return redirect()->to('/homepage');
                    } else {
                        $session->setFlashdata('msg', 'Password Salah');
                        return redirect()->to('/login');
                    }
                } else {
                    $session->setFlashdata('msg', 'Akun terblokir');
                    return redirect()->to('/login');
                }
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function simpanregistrasi()
    {
        $modelPengguna = new ModelPengguna();
        $modelPelanggan = new ModelPelanggan();

        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email wajib diisi',
                    'valid_email' => 'Format email tidak valid'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username wajib diisi',
                    'is_unique' => 'Username sudah digunakan'
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

        return redirect()
            ->to('/login')
            ->with(
                'success',
                'Anda telah berhasil registrasi. Silakan login menggunakan akun Anda.'
        );
    }
}
