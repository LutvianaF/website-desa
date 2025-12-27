<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;

class PengumumanController extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $data['pengumuman'] = $this->pengumumanModel->findAll();
        return view('admin/pengumuman/index', $data);
    }

    public function create()
    {
        return view('admin/pengumuman/create');
    }

    public function store()
    {
        $gambar = $this->request->getFile('gambar');
        $gambarName = null;

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move('uploads/pengumuman', $gambarName);
        }

        $judul = $this->request->getPost('judul');
        $slug  = url_title($judul, '-', true);

        $this->pengumumanModel->save([
            'judul'        => $judul,
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'gambar'       => $gambarName,
            'alt_gambar'   => $this->request->getPost('alt_gambar'),
            'meta_title'   => $this->request->getPost('meta_title'),
            'meta_desc'    => $this->request->getPost('meta_desc'),
            'slug'         => $slug,
        ]);

        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['pengumuman'] = $this->pengumumanModel->find($id);
        return view('admin/pengumuman/edit', $data);
    }

    public function update($id)
    {
        $pengumuman = $this->pengumumanModel->find($id);

        $gambar = $this->request->getFile('gambar');
        $gambarName = $pengumuman['gambar'];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move('uploads/pengumuman', $gambarName);
        }

        $judul = $this->request->getPost('judul');
        $slug  = url_title($judul, '-', true);

        $this->pengumumanModel->update($id, [
            'judul'        => $judul,
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'gambar'       => $gambarName,
            'alt_gambar'   => $this->request->getPost('alt_gambar'),
            'meta_title'   => $this->request->getPost('meta_title'),
            'meta_desc'    => $this->request->getPost('meta_desc'),
            'slug'         => $slug,
        ]);

        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil diupdate.');
    }

    public function delete($id)
    {
        // Ambil data dulu untuk menghapus file jika ada
        $pengumuman = $this->pengumumanModel->find($id);

        if (!$pengumuman) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Hapus file gambar jika ada
        if (!empty($pengumuman['gambar']) && file_exists('uploads/pengumuman/' . $pengumuman['gambar'])) {
            unlink('uploads/pengumuman/' . $pengumuman['gambar']);
        }

        // Hapus data dari database
        $this->pengumumanModel->delete($id);

        return redirect()->to('/admin/pengumuman')->with('success', 'Data berhasil dihapus.');
    }
}
