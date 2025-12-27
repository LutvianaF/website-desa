<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'   => 'Pembangunan Jalan Baru Desa Mataram',
                'isi'     => 'Pemerintah desa resmi memulai pembangunan jalan baru untuk memperlancar akses warga.',
                'gambar'  => 'uploads/berita/artikel.jpeg',
                'tanggal' => '2025-10-01',
            ],
            [
                'judul'   => 'Festival Budaya Tahunan',
                'isi'     => 'Festival budaya desa kembali digelar dengan meriah, menampilkan kesenian lokal.',
                'gambar'  => 'uploads/berita/artikel.jpeg',
                'tanggal' => '2025-09-20',
            ],
        ];

        $this->db->table('berita')->insertBatch($data);
    }
}
