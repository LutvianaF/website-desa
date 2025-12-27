<?php

namespace App\Controllers;

use App\Models\SejarahModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SejarahController extends BaseController
{
    public function index()
{
    $model = new SejarahModel();
    $data['sejarah'] = $model->first(); // ambil 1 data saja
    return view('sejarah', $data);
}

}
