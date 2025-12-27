<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LembagaModel;
use CodeIgniter\I18n\Time;

class LembagaController extends BaseController
{
    protected $lembagaModel;

    public function __construct()
    {
        $this->lembagaModel = new LembagaModel();
        helper(['text', 'form']);
    }

    // LIST DATA
    public function index()
    {
        $data = [
            'title'   => 'Data Lembaga Desa',
            'lembaga' => $this->lembagaModel->orderBy('id_lembaga', 'DESC')->findAll(),
        ];

        return view('admin/lembaga/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        $data = [
            'title' => 'Tambah Lembaga Desa',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/lembaga/create', $data);
    }

    // SIMPAN DATA BARU
    public function store()
    {
        $validationRules = [
            'nama_lembaga' => 'required|min_length[3]',
            'jabatan'      => 'permit_empty|max_length[255]',
            'nama'         => 'permit_empty|max_length[255]',
            'deskripsi'    => 'permit_empty',
            'gambar'       => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'alt_gambar'   => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $namaLembaga = $this->request->getPost('nama_lembaga');
        $slug        = url_title($namaLembaga, '-', true);

        // Upload aman
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/lembaga', $namaGambar);
        } else {
            return redirect()->back()->withInput()->with('errors', ['gambar' => 'Gambar gagal diupload.']);
        }

        $this->lembagaModel->insert([
            'nama_lembaga' => $namaLembaga,
            'slug'         => $slug,
            'jabatan'      => $this->request->getPost('jabatan'),
            'nama'         => $this->request->getPost('nama'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'gambar'       => $namaGambar,
            'alt_gambar'   => $this->request->getPost('alt_gambar'),
            'created_at'   => Time::now(),
            'updated_at'   => Time::now(),
        ]);

        return redirect()->to('/admin/lembaga')->with('success', 'Data lembaga berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (! $lembaga) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data lembaga tidak ditemukan.');
        }

        $data = [
            'title'     => 'Edit Lembaga Desa',
            'lembaga'   => $lembaga,
            'validation'=> \Config\Services::validation(),
        ];

        return view('admin/lembaga/edit', $data);
    }

    // UPDATE DATA
    public function update($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (! $lembaga) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data lembaga tidak ditemukan.');
        }

        $validationRules = [
            'nama_lembaga' => 'required|min_length[3]',
            'jabatan'      => 'permit_empty|max_length[255]',
            'nama'         => 'permit_empty|max_length[255]',
            'deskripsi'    => 'permit_empty',
            'gambar'       => 'if_exist|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
            'alt_gambar'   => 'permit_empty|max_length[255]',
        ];

        if (! $this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $namaLembaga = $this->request->getPost('nama_lembaga');
        $slug        = url_title($namaLembaga, '-', true);

        $dataUpdate = [
            'nama_lembaga' => $namaLembaga,
            'slug'         => $slug,
            'jabatan'      => $this->request->getPost('jabatan'),
            'nama'         => $this->request->getPost('nama'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'alt_gambar'   => $this->request->getPost('alt_gambar'),
            'updated_at'   => Time::now(),
        ];

        // Cek apakah ada upload gambar baru
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid() && ! $fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('uploads/lembaga', $namaGambarBaru);

            // hapus gambar lama
            if (!empty($lembaga['gambar']) && file_exists('uploads/lembaga/' . $lembaga['gambar'])) {
                @unlink('uploads/lembaga/' . $lembaga['gambar']);
            }

            $dataUpdate['gambar'] = $namaGambarBaru;
        }

        $this->lembagaModel->update($id, $dataUpdate);

        return redirect()->to('/admin/lembaga')->with('success', 'Data lembaga berhasil diperbarui.');
    }

    // HAPUS DATA
    public function delete($id)
    {
        $lembaga = $this->lembagaModel->find($id);

        if (! $lembaga) {
            return redirect()->to('/admin/lembaga')->with('error', 'Data lembaga tidak ditemukan.');
        }

        // hapus gambar
        if (!empty($lembaga['gambar']) && file_exists('uploads/lembaga/' . $lembaga['gambar'])) {
            @unlink('uploads/lembaga/' . $lembaga['gambar']);
        }

        $this->lembagaModel->delete($id);

        return redirect()->to('/admin/lembaga')->with('success', 'Data lembaga berhasil dihapus.');
    }
}
