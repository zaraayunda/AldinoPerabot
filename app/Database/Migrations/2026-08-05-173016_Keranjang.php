<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keranjang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idkeranjang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'idpelanggan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'idproduk' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'tanggalkeranjang' => [
                'type' => 'DATE',
            ],

            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],

            'statuskeranjang' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'aktif',
                    'checkout'
                ],
                'default' => 'aktif',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idkeranjang', true);

        // Index Foreign Key
        $this->forge->addKey('idpelanggan');
        $this->forge->addKey('idproduk');

        // Foreign Key
        $this->forge->addForeignKey(
            'idpelanggan',
            'pelanggan',
            'idpelanggan',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'idproduk',
            'produk',
            'idproduk',
            'CASCADE',
            'CASCADE'
        );

        // Membuat tabel
        $this->forge->createTable('keranjang');
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
