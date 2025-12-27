<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KritikModel;

class KritikController extends BaseController
{
    protected $kritikModel;

    public function __construct()
    {
        $this->kritikModel = new KritikModel();
    }

    // Kalau ingin halaman kritik terpisah (opsional)
    public function index()
    {
        $data = [
            'title' => 'Kritik untuk Desa',
        ];

        return view('kritik', $data); // sesuaikan dengan nama file view-mu
    }

    public function store()
    {
        // Validasi sederhana (bisa pakai validation service juga)
        $name   = $this->request->getPost('name');
        $email  = $this->request->getPost('email');
        $kritik = $this->request->getPost('kritik');

        if (empty($name) || empty($email) || empty($kritik)) {
            return redirect()->back()
                ->with('error', 'Semua field wajib diisi.')
                ->withInput();
        }

        // Simpan ke database
        $this->kritikModel->save([
            'nama'   => $name,
            'link_email'  => $email,
            'kritikan' => $kritik,
        ]);

        return redirect()->back()
            ->with('success', 'Terima kasih, kritik Anda sudah kami terima.');
    }
}
