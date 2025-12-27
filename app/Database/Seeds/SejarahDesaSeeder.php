<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SejarahDesaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'judul' => 'SEJARAH DESA',
            'gambar' => 'img/profil.jpeg',
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel
facere eos maiores voluptatem magnam corrupti officia nam.
Mollitia ab expedita omnis adipisci perferendis temporibus dolorem
similique nobis voluptatibus, eveniet a.

Lorem ipsum dolor sit, amet consectetur adipisicing elit.
Temporibus quasi illo animi. Minus explicabo expedita consequatur
nam numquam rerum magnam animi illum eaque nobis! Dolorem est
distinctio iste illo voluptatibus!

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus a
temporibus esse aut obcaecati quisquam consectetur assumenda
perspiciatis dolore. Repudiandae consequuntur, distinctio
inventore dolorem reiciendis exercitationem tempora soluta itaque
natus?",
        ];

        // Insert ke tabel
        $this->db->table('tb_sejarah')->insert($data);
    }
}
