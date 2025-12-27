<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SarprasModel;
use App\Models\PrasaranaModel;
use App\Models\TanahModel;

class SarprasController extends BaseController
{
    protected $prasarana;
    protected $tanah;

    public function __construct()
    {
        $this->prasarana = new PrasaranaModel();
        $this->tanah = new TanahModel();
    }
    public function index()
    {
        $sarpras = new SarprasModel(); 
        $prasarana = new PrasaranaModel(); 
        $tanah = new TanahModel(); 
        $data = [
            'sarpras' => $sarpras->findAll(),
            'prasarana' => $prasarana->getSarprasGIS(),
            'tanah' => $tanah->getTanahBySarpras(),
        ];

        return view('sarana_prasarana', $data);
    }

    public function detailPrasarana($id)
    {
        $prasarana = $this->prasarana
            ->where('id_prasarana', $id)
            ->first();

        if (!$prasarana) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                'Data prasarana tidak ditemukan'
            );
        }
        
        return view('detailPrasarana', [
            'prasarana' => $prasarana,
        ]);
    }

    public function detailTanah($id)
    {
        $tanah = $this->tanah
            ->where('id_tanah', $id)
            ->first();

        if (!$tanah) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                'Data tanah tidak ditemukan'
            );
        }

        return view('detailTanah', [
            'tanah' => $tanah
        ]);
    }
}
