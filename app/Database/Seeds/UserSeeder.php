<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'iduser'     => 'USR0000001',
                'namauser'   => 'Melvi Oktavia',
                'email'      => 'aldinoperabot@gmail.com',
                'username'   => 'adminperabot',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'status'     => 'aktif',
            ],
            [
                'iduser'     => 'USR0000002',
                'namauser'   => 'Aldino Oktami',
                'email'      => 'dinook@gmail.com',
                'username'   => 'pemilik',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'role'       => 'pemilik',
                'status'     => 'aktif',
            ]
        ];

        $this->db->table('user')->insert($data);
    }
}
