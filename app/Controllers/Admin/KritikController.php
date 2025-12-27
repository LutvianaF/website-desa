<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KritikModel;

class KritikController extends BaseController
{
    protected $kritikModel;

    public function __construct()
    {
        $this->kritikModel = new KritikModel();
    }

    public function index()
    {
        // Ambil semua kritik urut terbaru
        $kritik = $this->kritikModel
            ->orderBy('id_kritik', 'DESC')
            ->findAll();

        $data = [
            'title'  => 'Manajemen Kritik Masyarakat',
            'kritik' => $kritik,
        ];

        return view('admin/kritik/index', $data);
    }
}
