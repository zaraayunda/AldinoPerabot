<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iduser' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'namauser' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'role' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'admin',
                    'pelanggan',
                    'pimpinan'
                ],
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'aktif',
                    'nonaktif'
                ],
                'default' => 'aktif',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('iduser', true);

        // Unique Key
        $this->forge->addUniqueKey('username');

        // Membuat tabel
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
