<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AgendaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'     => 'Rapat Musyawarah Dusun',
                'deskripsi' => 'Pembahasan rencana pembangunan tahun depan.',
                'tanggal'   => '2025-10-10',
                'waktu'     => '09:00:00',
                'lokasi'    => 'Balai Dusun Mulyorejo',
                'gambar'    => 'img/artikel.jpeg',
            ],
            [
                'judul'     => 'Gotong Royong Bersih Desa',
                'deskripsi' => 'Kegiatan rutin untuk menjaga kebersihan lingkungan desa.',
                'tanggal'   => '2025-10-14',
                'waktu'     => '08:00:00',
                'lokasi'    => 'Seluruh Desa',
                'gambar'    => 'img/artikel.jpeg',
            ],
        ];

        $this->db->table('agenda')->insertBatch($data);
    }
}
