<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StrukturModel;

class StrukturController extends BaseController
{
    protected $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturModel();
    }

    public function index()
    {
        $data = [
            'struktur' => $this->strukturModel->findAll(),
        ];

        return view('admin/struktur/index', $data);
    }

    public function create()
    {
        return view('admin/struktur/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'permit_empty',
            'masa_jabatan' => 'required',
            'kontak' => 'permit_empty',
            'email' => 'permit_empty|valid_email',
            'gambar' => 'permit_empty|uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal.');
        }

        $imgName = null;
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/struktur', $imgName);
        }

        $this->strukturModel->save([
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'nip' => $this->request->getPost('nip'),
            'masa_jabatan' => $this->request->getPost('masa_jabatan'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'gambar' => $imgName,
        ]);

        return redirect()->to('/admin/struktur')->with('success', 'Data struktur berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = ['struktur' => $this->strukturModel->find($id),];
        return view('admin/struktur/edit', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'permit_empty|valid_email',
            'gambar' => 'permit_empty|uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal.');
        }

        $file = $this->request->getFile('gambar');
        $imgName = $this->request->getPost('gambar_lama');

        if ($file && $file->isValid()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/struktur', $imgName);
        }

        $this->strukturModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'nip' => $this->request->getPost('nip'),
            'masa_jabatan' => $this->request->getPost('masa_jabatan'),
            'kontak' => $this->request->getPost('kontak'),
            'email' => $this->request->getPost('email'),
            'gambar' => $imgName,
        ]);

        return redirect()->to('/admin/struktur')->with('success', 'Data struktur berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->strukturModel->delete($id);
        return redirect()->to('/admin/struktur')->with('success', 'Data struktur berhasil dihapus.');
    }
}
