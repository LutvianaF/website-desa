<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WilayahModel;

class WilayahController extends BaseController
{
    protected $wilayah;

    public function __construct()
    {
        $this->wilayah = new WilayahModel();
    }

    // LIST DATA
    public function index()
    {
        $data['wilayah'] = $this->wilayah->findAll();
        return view('admin/wilayah/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin/wilayah/create');
    }

    // PROSES TAMBAH
    public function store()
    {
        $this->wilayah->save([
            'nama_wilayah' => $this->request->getPost('nama_wilayah'),
            'jumlah_rt'    => $this->request->getPost('jumlah_rt'),
            'jumlah_rw'    => $this->request->getPost('jumlah_rw'),
            'luas'         => $this->request->getPost('luas'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/wilayah')->with('success', 'Data wilayah berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data['w'] = $this->wilayah->find($id);
        return view('admin/wilayah/edit', $data);
    }

    // PROSES UPDATE
    public function update($id)
    {
        $this->wilayah->update($id, [
            'nama_wilayah' => $this->request->getPost('nama_wilayah'),
            'jumlah_rt'    => $this->request->getPost('jumlah_rt'),
            'jumlah_rw'    => $this->request->getPost('jumlah_rw'),
            'luas'         => $this->request->getPost('luas'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/wilayah')->with('success', 'Data wilayah berhasil diperbarui!');
    }

    // HAPUS
    public function delete($id)
    {
        $this->wilayah->delete($id);
        return redirect()->to('/admin/wilayah')->with('success', 'Data berhasil dihapus!');
    }
}
