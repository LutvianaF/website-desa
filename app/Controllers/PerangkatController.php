<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PerangkatModel;

class PerangkatController extends BaseController
{
    public function index()
    {
        $model = new PerangkatModel();
        $data ['perangkat'] = $model->findAll();
        return view('perangkat', $data);
    }
}
