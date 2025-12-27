<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use CodeIgniter\HTTP\ResponseInterface;
// use App\Models\MapModel;

class KontakController extends BaseController
{
       public function index()
    {
        // $model = new MapModel();
        // $data = [            
        //     'objects' => $model->findAll(),
        // ];

        return view('kontak');
    }

}
