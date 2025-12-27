<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LembagaModel;

class LembagaController extends BaseController
{
    public function index()
    {
        $model = new LembagaModel();
        $data = [
            'lembaga'    => $model->findAll(),
            'meta_title' => 'Lembaga Desa',
            'meta_desc'  => 'Daftar lembaga desa yang berperan dalam pelayanan dan pembangunan masyarakat.'
        ];

        return view('lembaga', $data);
    }

    public function detail($slug)
    {
        $model = new LembagaModel();
        $lembaga = $model->getBySlug($slug);

        if (!$lembaga) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Lembaga tidak ditemukan");
        }

        $data = [
            'lembaga' => $lembaga,

            'meta_title' => !empty($lembaga['meta_title'])
                ? $lembaga['meta_title']
                : $lembaga['nama_lembaga'] . ' | Lembaga Desa',

            'meta_desc' => !empty($lembaga['meta_desc'])
                ? $lembaga['meta_desc']
                : substr(strip_tags($lembaga['deskripsi'] ?? ''), 0, 160),
        ];

        return view('detailLembaga', $data);
    }
}
