<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PembangunanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PembangunanController extends BaseController
{
    public function index()
    {
        $model = new PembangunanModel();

        $data = [
            'pembangunan' => $model->orderBy('created_at', 'DESC')->findAll(),
            'meta_title'  => 'Pembangunan Desa',
            'meta_desc'   => 'Informasi dan laporan pembangunan desa yang sedang dan telah dilaksanakan.'
        ];

        return view('pembangunan', $data);
    }

    public function detail($slug)
    {
        $model = new PembangunanModel();
        $pembangunan = $model->where('slug', $slug)->first();

        if (!$pembangunan) {
            throw new PageNotFoundException('Data pembangunan tidak ditemukan.');
        }

        $data = [
            'pembangunan' => $pembangunan,

            'meta_title' => !empty($pembangunan['meta_title'])
                ? $pembangunan['meta_title']
                : $pembangunan['judul'] . ' | Pembangunan Desa',

            'meta_desc' => !empty($pembangunan['meta_desc'])
                ? $pembangunan['meta_desc']
                : substr(strip_tags($pembangunan['deskripsi'] ?? ''), 0, 160),
        ];

        return view('pembangunan_detail', $data);
    }
}
