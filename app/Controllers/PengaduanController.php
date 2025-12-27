<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use App\Models\KategoriPengaduanModel;

class PengaduanController extends BaseController
{
    protected $pengaduanModel;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
    }

    // Kalau mau halaman pengaduan terpisah (opsional, bisa dipanggil dari route /pengaduan)
    public function index()
    {
        $kategoriModel = new KategoriPengaduanModel();

        $data = [
            'title'              => 'Pengaduan Masyarakat',
            'kategori_pengaduan' => $kategoriModel->orderBy('nama_kategori', 'ASC')->findAll(),
        ];

        return view('pengaduan', $data);
    }


    public function store()
    {
        $nama      = $this->request->getPost('name');
        $email     = $this->request->getPost('email');
        $kategori  = $this->request->getPost('kategori');   // dari <select name="kategori">
        $pengaduan = $this->request->getPost('pengaduan');

        // Validasi sederhana
        if (empty($nama) || empty($email) || empty($kategori) || empty($pengaduan)) {
            return redirect()->back()
                ->with('error', 'Semua field wajib diisi.')
                ->withInput();
        }

        // Simpan ke database
        $this->pengaduanModel->save([
            'id_kategori_pengaduan' => $kategori, // untuk sekarang pakai value dari select
            'nama'                  => $nama,
            'link_email'            => $email,
            'pengaduan'             => $pengaduan,
        ]);

        return redirect()->back()
            ->with('success', 'Terima kasih, pengaduan Anda sudah kami terima.');
    }
}
