<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftaran extends Migration
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
            'no_pendaftaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'id_customer' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'tgl_pendaftaran' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'keluhan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_pendaftaran' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu','proses', 'selesai'],
                'null'    => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_pendaftaran');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pendaftaran');
    }
}
