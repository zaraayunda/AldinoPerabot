<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPengajuanCustom extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iddetailcustom' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'idpengajuan' => [
                'type'       => 'CHAR',
                'constraint' => 10,
            ],

            'namaprodukcustom' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'detailcustom' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],

            'fotoreferensi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'qty' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],

            'hargacustom' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => true,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('iddetailcustom', true);

        // Index Foreign Key
        $this->forge->addKey('idpengajuan');

        // Foreign Key
        $this->forge->addForeignKey(
            'idpengajuan',
            'pengajuan_custom',
            'idpengajuan',
            'CASCADE',
            'CASCADE'
        );

        // Membuat tabel
        $this->forge->createTable('detail_pengajuan_custom');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pengajuan_custom');
    }
}
