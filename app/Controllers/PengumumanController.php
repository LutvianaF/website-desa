<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;

class PengumumanController extends BaseController
{
    public function index()
    {
        $model = new PengumumanModel();

        $data = [
            'pengumuman' => $model->orderBy('tanggal', 'DESC')->findAll(),
            'meta_title' => 'Pengumuman Desa',
            'meta_desc'  => 'Pengumuman resmi dan informasi penting dari pemerintah desa.'
        ];

        return view('pengumuman', $data);
    }

    public function detail($slug)
    {
        $model = new PengumumanModel();
        $pengumuman = $model->where('slug', $slug)->first();

        if (!$pengumuman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Pengumuman tidak ditemukan'
            );
        }

        $data = [
            'pengumuman' => $pengumuman,

            'meta_title' => !empty($pengumuman['meta_title'])
                ? $pengumuman['meta_title']
                : $pengumuman['judul'] . ' | Pengumuman Desa',

            'meta_desc' => !empty($pengumuman['meta_desc'])
                ? $pengumuman['meta_desc']
                : substr(strip_tags($pengumuman['deskripsi']), 0, 160)
        ];

        return view('detailPengumuman', $data);
    }
}
