<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iddetailpesanan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'idpesanan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'idproduk' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],

            'diskon' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],

            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'subtotal' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('iddetailpesanan', true);

        // Index Foreign Key
        $this->forge->addKey('idpesanan');
        $this->forge->addKey('idproduk');

        // Foreign Key
        $this->forge->addForeignKey(
            'idpesanan',
            'pesanan',
            'idpesanan',
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
        $this->forge->createTable('detail_pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pesanan');
    }
}
