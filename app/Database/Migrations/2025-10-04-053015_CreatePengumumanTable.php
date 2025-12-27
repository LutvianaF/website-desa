<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengumumanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'judul'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'isi'         => ['type' => 'TEXT'],
            'gambar'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'file'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true], // untuk file lampiran (pdf, docx, dll)
            'tanggal_post'=> ['type' => 'DATE'],
            'tanggal_exp' => ['type' => 'DATE', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman');
    }
}
