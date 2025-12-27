<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SejarahModel;

class SejarahController extends BaseController
{
    protected $sejarahModel;

    public function __construct()
    {
        $this->sejarahModel = new SejarahModel();
    }

    public function index()
    {
        $data['sejarah'] = $this->sejarahModel->findAll();
        return view('admin/sejarah/index', $data);
    }

    public function create()
    {
        return view('admin/sejarah/create');
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $gambar = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/sejarah', $newName);
            $gambar = 'uploads/sejarah/' . $newName;
        }

        $this->sejarahModel->save([
            'judul'     => $this->request->getPost('judul'),
            'gambar'    => $gambar,
            'isi' => $this->request->getPost('isi'),
        ]);

        return redirect()->to('/admin/sejarah')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['sejarah'] = $this->sejarahModel->find($id);
        return view('admin/sejarah/edit', $data);
    }

    public function update($id)
    {
        $sejarah = $this->sejarahModel->find($id);

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // hapus gambar lama jika ada
            if (!empty($sejarah['gambar']) && file_exists($sejarah['gambar'])) {
                unlink($sejarah['gambar']);
            }

            $newName = $file->getRandomName();
            $file->move('uploads/sejarah', $newName);
            $gambar = 'uploads/sejarah/' . $newName;
        } else {
            $gambar = $sejarah['gambar']; // pakai gambar lama
        }

        $this->sejarahModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'gambar'    => $gambar,
            'isi' => $this->request->getPost('isi'),
        ]);

        return redirect()->to('/admin/sejarah')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $sejarah = $this->sejarahModel->find($id);

        // hapus file gambar dari server
        if (!empty($sejarah['gambar']) && file_exists($sejarah['gambar'])) {
            unlink($sejarah['gambar']);
        }

        $this->sejarahModel->delete($id);
        return redirect()->to('/admin/sejarah')->with('success', 'Data berhasil dihapus');
    }
}
