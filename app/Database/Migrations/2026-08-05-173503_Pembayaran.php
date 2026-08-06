<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpembayaran' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'idpesanan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'jenispembayaran' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'DP',
                    'Full Payment',
                    'Pelunasan'
                ],
            ],

            'metode_pembayaran' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'cash',
                    'transfer'
                ],
            ],

            'jumlahbayar' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'bukti_pembayaran' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'statuspembayaran' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'menunggu_pembayaran',
                    'valid',
                    'ditolak'
                ],
                'default' => 'menunggu_pembayaran',
            ],

            'tanggalpembayaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idpembayaran', true);

        // Index Foreign Key
        $this->forge->addKey('idpesanan');

        // Foreign Key
        $this->forge->addForeignKey(
            'idpesanan',
            'pesanan',
            'idpesanan',
            'CASCADE',
            'CASCADE'
        );

        // Membuat tabel
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
