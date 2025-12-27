<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PembangunanModel;

class PembangunanController extends BaseController
{
    protected $pembangunanModel;

    public function __construct()
    {
        $this->pembangunanModel = new PembangunanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pembangunan',
            'pembangunan' => $this->pembangunanModel->findAll()
        ];

        return view('admin/pembangunan/index', $data);
    }

    public function create()
    {
        return view('admin/pembangunan/create');
    }

    public function store()
    {
        $validated = $this->validate([
            'nama_pembangunan' => 'required',
            'lokasi' => 'required',
            'anggaran' => 'required|numeric',
            'progres' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]',
        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('foto');
        $filename = $file->getRandomName();
        $file->move('uploads/pembangunan', $filename);

        $slug = url_title($this->request->getPost('nama_pembangunan'), '-', true);

        $this->pembangunanModel->save([
            'nama_pembangunan' => $this->request->getPost('nama_pembangunan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'anggaran' => $this->request->getPost('anggaran'),
            'progres' => $this->request->getPost('progres'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_desc' => $this->request->getPost('meta_desc'),
            'slug' => $slug,
            'foto' => $filename,
            'alt_foto' => $this->request->getPost('alt_foto'),
        ]);

        return redirect()->to('/admin/pembangunan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'pembangunan' => $this->pembangunanModel->find($id)
        ];

        return view('admin/pembangunan/edit', $data);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'nama_pembangunan' => 'required',
            'lokasi' => 'required',
            'anggaran' => 'required|numeric',
            'progres' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'is_image[foto]|max_size[foto,2048]',
        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataUpdate = [
            'id_pembangunan' => $id,
            'nama_pembangunan' => $this->request->getPost('nama_pembangunan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'anggaran' => $this->request->getPost('anggaran'),
            'progres' => $this->request->getPost('progres'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'meta_title' => $this->request->getPost('meta_title'),
            'meta_desc' => $this->request->getPost('meta_desc'),
            'alt_foto' => $this->request->getPost('alt_foto'),
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // upload file baru
            $filename = $file->getRandomName();
            $file->move('uploads/pembangunan', $filename);
            $dataUpdate['foto'] = $filename;
        } else {
            // pakai foto lama
            $dataUpdate['foto'] = $this->request->getPost('foto_lama');
        }

        $this->pembangunanModel->save($dataUpdate);

        return redirect()->to('/admin/pembangunan')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->pembangunanModel->delete($id);
        return redirect()->to('/admin/pembangunan')->with('success', 'Data berhasil dihapus');
    }
}
