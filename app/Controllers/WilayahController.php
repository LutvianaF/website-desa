<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WilayahModel;

class WilayahController extends BaseController
{
    public function index()
    {
        $wilayahModel = new WilayahModel();
        $data['wilayah'] = $wilayahModel->findAll();

        return view('wilayah', $data);
    }
}
