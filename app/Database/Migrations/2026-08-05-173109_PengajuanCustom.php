<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengajuanCustom extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idpengajuan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'idpelanggan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'tanggalpengajuan' => [
                'type' => 'DATE',
            ],

            'statuscustom' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'menunggu',
                    'penawaran_harga',
                    'disetujui',
                    'batal'
                ],
                'default' => 'menunggu',
            ],
        ]);

        // Primary Key
        $this->forge->addKey('idpengajuan', true);

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
        $this->forge->createTable('pengajuan_custom');
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_custom');
    }
}
