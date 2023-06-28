<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'id_customer' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => false,
            ],
            'id_pendaftaran' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => false,
            ],
            'tgl_transaksi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'biaya_pengobatan' => [
                'type' => 'BIGINT',
                'constraint' =>'20',
                'null' => true,
            ],
            'status_transaksi' => [
                'type'       => 'ENUM',
                'constraint' => ['belum bayar', 'selesai'],
                'null'    => 'true',
            ],
            'total_biaya' => [
                'type' => 'BIGINT',
                'constraint' =>'20',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_transaksi');
    }
}
