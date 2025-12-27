<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    public function index()
    {
        $model = new BeritaModel();

        $data = [
            'berita' => $model->orderBy('tanggal', 'DESC')->findAll(6),
            'meta_title' => 'Berita Desa',
            'meta_desc'  => 'Informasi dan berita terbaru seputar kegiatan dan perkembangan desa.'
        ];

        return view('berita', $data);
    }

    public function detail($slug)
    {
        $model = new BeritaModel();
        $berita = $model->where('slug', $slug)->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
        }

        $data = [
            'berita' => $berita,

            'meta_title' => !empty($berita['meta_title'])
                ? $berita['meta_title']
                : $berita['judul'] . ' | Berita Desa',

            'meta_desc' => !empty($berita['meta_desc'])
                ? $berita['meta_desc']
                : substr(strip_tags($berita['deskripsi']), 0, 160)
        ];

        return view('detailBerita', $data);
    }
}
