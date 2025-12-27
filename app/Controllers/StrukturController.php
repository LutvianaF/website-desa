<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StrukturModel;

class StrukturController extends BaseController
{
    public function struktur()
    {
        $model = new StrukturModel();
        $data = [
            'struktur'    => $model->findAll(),
            'meta_title'  => 'Struktur Organisasi Pemerintah Desa',
            'meta_desc'   => 'Informasi lengkap struktur organisasi pemerintah desa beserta tugas dan jabatan masing-masing perangkat desa.'
        ];
        return view('struktur', $data);
    }

    public function detail($slug)
    {
        $model = new StrukturModel();
        $struktur = $model->where('slug', $slug)->first();

        if (!$struktur) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data struktur dengan slug $slug tidak ditemukan");
        }

        $data = [
            'struktur'   => $struktur,
            'meta_title' => !empty($struktur['meta_title'])
                ? $struktur['meta_title']
                : $struktur['nama'] . ' | Struktur Organisasi Desa',

            'meta_desc'  => !empty($struktur['meta_desc'])
                ? $struktur['meta_desc']
                : substr(strip_tags($struktur['deskripsi']), 0, 160)
        ];

        return view('detailStruktur', $data);
    }
}
