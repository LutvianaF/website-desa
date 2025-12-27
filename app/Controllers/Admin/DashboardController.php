<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AgendaModel;
use App\Models\PengumumanModel;
use App\Models\BeritaModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $agendaModel  = new AgendaModel();
        $pengumumanModel  = new PengumumanModel();
        $beritaModel = new BeritaModel();

        $data = [
            'sliderCount'  => $agendaModel->countAllResults(),
            'produkCount'  => $pengumumanModel->countAllResults(),
            'artikelCount' => $beritaModel->countAllResults(),
        ];

        return view('admin/dashboard/index', $data);
    }
}
