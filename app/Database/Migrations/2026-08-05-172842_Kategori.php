<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idkategori' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'namakategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'deskripsi' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idkategori', true);

        // Membuat tabel
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
