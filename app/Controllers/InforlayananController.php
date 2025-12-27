<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class InforlayananController extends BaseController
{
    public function index()
    {
        return view('informasi_layanan');
    }
}
