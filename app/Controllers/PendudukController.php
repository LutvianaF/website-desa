<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;

class PendudukController extends BaseController
{
    public function index()
    {
        $pendudukModel = new PendudukModel();

        $data['summary'] = $pendudukModel->getSummary();
        $data['rekapDusun'] = $pendudukModel->getRekapDusun();

        // Data untuk Chart.js
        $data['chartLabels'] = array_column($data['rekapDusun'], 'dusun');
        $data['chartDataLaki'] = array_column($data['rekapDusun'], 'laki');
        $data['chartDataPerempuan'] = array_column($data['rekapDusun'], 'perempuan');

        return view('penduduk', $data);
    }

}
