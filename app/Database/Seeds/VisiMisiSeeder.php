<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'visi'       => 'Menjadi desa mandiri, maju, dan sejahtera dengan berlandaskan gotong royong.',
            'misi'       => 'Meningkatkan kualitas pendidikan, kesehatan, serta mengembangkan potensi ekonomi dan pariwisata desa.',
            'gambar'     => 'uploads/visimisi/VM.jpeg', // pastikan file ini ada di folder public/uploads/visimisi
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert ke tabel visimisi
        $this->db->table('visimisi')->insert($data);
}
}