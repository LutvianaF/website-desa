<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VisimisiModel;

class VisimisiController extends BaseController
{
    protected $visimisiModel;

    public function __construct()
    {
        $this->visimisiModel = new VisimisiModel();
    }

    public function index()
    {
        $data['visimisi'] = $this->visimisiModel->first();
        return view('admin/visimisi/index', $data);
    }

    public function create()
    {
        return view('admin/visimisi/create');
    }

    public function store()
    {
        $rules = [
            'visi'   => 'required|min_length[3]',
            'misi'   => 'required|min_length[3]',
            'gambar' => 'permit_empty|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]'
        ];

        if (!$this->validate($rules)) {
            return view('admin/visimisi/create', [
                'validation' => $this->validator
            ]);
        }

        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/visimisi', $namaGambar);
        }

        $this->visimisiModel->save([
            'visi'   => $this->request->getPost('visi'),
            'misi'   => $this->request->getPost('misi'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/visimisi')
            ->with('success', 'Visi & Misi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['visimisi'] = $this->visimisiModel->find($id);

        if (!$data['visimisi']) {
            return redirect()->to('/admin/visimisi')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/visimisi/edit', $data);
    }

    public function update($id)
    {
        $visimisi = $this->visimisiModel->find($id);

        if (!$visimisi) {
            return redirect()->to('/admin/visimisi')
                ->with('error', 'Data tidak ditemukan.');
        }

        $dataUpdate = [
            'visi' => $this->request->getPost('visi'),
            'misi' => $this->request->getPost('misi'),
        ];

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/visimisi', $newName);

            // hapus gambar lama
            if (!empty($visimisi['gambar'])) {
                $oldPath = 'uploads/visimisi/' . $visimisi['gambar'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $dataUpdate['gambar'] = $newName;
        }

        $this->visimisiModel->update($id, $dataUpdate);

        return redirect()->to('/admin/visimisi')
            ->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $visimisi = $this->visimisiModel->find($id);

        if (!$visimisi) {
            return redirect()->to('/admin/visimisi')
                ->with('error', 'Data tidak ditemukan.');
        }

        // hapus gambar
        if (!empty($visimisi['gambar'])) {
            $path = 'uploads/visimisi/' . $visimisi['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->visimisiModel->delete($id);

        return redirect()->to('/admin/visimisi')
            ->with('success', 'Data berhasil dihapus.');
    }
}
