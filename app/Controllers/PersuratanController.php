<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PersuratanController extends BaseController
{
    public function index()
    {
        return view('persuratan');
    }
}
