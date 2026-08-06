<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpesanan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'idpelanggan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'tanggalpesanan' => [
                'type' => 'DATE',
            ],

            'biayaantar' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => true,
            ],

            'total' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0,
            ],

            'estimasiwaktu' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],

            'statuspesanan' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'menunggu_konfirmasi',
                    'dikonfirmasi',
                    'proses_produksi',
                    'proses_pengantaran',
                    'selesai',
                    'batal'
                ],
                'default' => 'menunggu_konfirmasi',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idpesanan', true);

        // Index Foreign Key
        $this->forge->addKey('idpelanggan');

        // Foreign Key
        $this->forge->addForeignKey(
            'idpelanggan',
            'pelanggan',
            'idpelanggan',
            'CASCADE',
            'CASCADE'
        );

        // Membuat tabel
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}
