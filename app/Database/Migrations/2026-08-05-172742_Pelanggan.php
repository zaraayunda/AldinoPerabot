<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpelanggan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'iduser' => [
                'type'       => 'CHAR',
                'constraint' => 10,
                'null'       => true,
            ],

            'namapelanggan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'alamat' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],

            'nohp' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => true,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idpelanggan', true);

        // Index untuk Foreign Key
        $this->forge->addKey('iduser');

        // Foreign Key
        $this->forge->addForeignKey(
            'iduser',
            'user',
            'iduser',
            'CASCADE',
            'CASCADE'
        );

        // Membuat tabel
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
