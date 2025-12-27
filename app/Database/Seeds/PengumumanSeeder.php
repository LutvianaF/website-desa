<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'          => 'Pendaftaran BLT Tahap 3 Dibuka',
                'isi'            => 'Pemerintah desa membuka pendaftaran BLT Tahap III mulai tanggal 4 hingga 10 Oktober 2025.',
                'gambar'         => 'default.jpg',
                'tanggal_post'=> '2025-10-04',
                'tanggal_exp'=> '2025-10-10',
                'file'           => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'judul'          => 'Surat Undangan Musdus',
                'isi'            => 'Undangan resmi untuk musyawarah dusun yang akan dilaksanakan di balai desa.',
                'gambar'         => 'default.jpg',
                'tanggal_post'=> '2025-10-04',
                'tanggal_exp'=> null,
                'file'           => 'undangan_musdus.pdf',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pengumuman')->insertBatch($data);
    }
}
