<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idproduk' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'idkategori' => [
                'type'       => 'CHAR',
                'constraint' => 10,
                'null'       => true,
            ],

            'namaproduk' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'jenisproduk' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'katalog',
                    'custom'
                ],
            ],

            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'diskon' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],

            'detailproduk' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],

            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'statusproduk' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'aktif',
                    'nonaktif'
                ],
                'default' => 'nonaktif',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idproduk', true);

        // Index Foreign Key
        $this->forge->addKey('idkategori');

        // Foreign Key
        $this->forge->addForeignKey(
            'idkategori',
            'kategori',
            'idkategori',
            'CASCADE',
            'CASCADE'
        );

        // Membuat tabel
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
