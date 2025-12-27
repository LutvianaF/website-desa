<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $data['berita'] = $this->beritaModel->orderBy('tanggal', 'DESC')->findAll();
        return view('admin/berita/index', $data);
    }

    public function create()
    {
        return view('admin/berita/create');
    }

    public function store()
    {
        helper(['text', 'url']);

        $gambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/berita', $namaGambar);
        }

        // 1) slug dari judul (spasi -> -, lowercase)
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', true); // true => lowercase

        // 2) bikin unik kalau slug sudah ada
        $baseSlug = $slug;
        $i = 1;
        while ($this->beritaModel->where('slug', $slug)->first()) {
            $slug = $baseSlug . '-' . $i++;
        }

        $this->beritaModel->save([
            'judul'     => $judul,
            'slug'      => $slug, // ⬅️ simpan slug
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal'   => $this->request->getPost('tanggal'),
            'gambar'    => $namaGambar ? 'uploads/berita/' . $namaGambar : null,
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['berita'] = $this->beritaModel->find($id);
        return view('admin/berita/edit', $data);
    }

    public function update($id)
    {
        $berita = $this->beritaModel->find($id);
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $berita['gambar'];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            if ($namaGambar && file_exists($namaGambar)) {
                unlink($namaGambar);
            }
            $namaGambarBaru = $gambar->getRandomName();
            $gambar->move('uploads/berita', $namaGambarBaru);
            $namaGambar = 'uploads/berita/' . $namaGambarBaru;
        }

        $this->beritaModel->update($id, [
            'judul'   => $this->request->getPost('judul'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'gambar'  => $namaGambar,
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diperbarui');
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);
        if ($berita['gambar'] && file_exists($berita['gambar'])) {
            unlink($berita['gambar']);
        }
        $this->beritaModel->delete($id);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil dihapus');
    }
}
