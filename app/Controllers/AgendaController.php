<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaModel;

class AgendaController extends BaseController
{
    public function index()
    {
        $agendaModel = new AgendaModel();
        $data = [
            'agenda'     => $agendaModel->orderBy('tanggal_mulai', 'DESC')->findAll(),
            'meta_title' => 'Agenda Kegiatan Desa',
            'meta_desc'  => 'Daftar agenda dan kegiatan resmi desa yang akan dan telah dilaksanakan.'
        ];
        return view('agenda', $data);
    }

    public function detail($slug)
    {
        $agendaModel = new AgendaModel();
        $agenda = $agendaModel->where('slug', $slug)->first();

        if (!$agenda) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'agenda' => $agenda,
            'meta_title' => !empty($agenda['meta_title']) ? $agenda['meta_title'] : $agenda['judul'] . ' | Agenda Desa',
            'meta_desc'  => !empty($agenda['meta_desc']) ? $agenda['meta_desc'] : substr(strip_tags($agenda['deskripsi']), 0, 160)
        ];

        return view('detailAgenda', $data);
    }
}
