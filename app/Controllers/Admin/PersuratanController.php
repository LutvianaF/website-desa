<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PersuratanModel;

class PersuratanController extends BaseController
{
    protected $persuratan;

    public function __construct()
    {
        $this->persuratan = new PersuratanModel();
    }

    // LIST
    public function index()
    {
        $data = [
            'title' => 'Data Persuratan',
            'persuratan' => $this->persuratan->orderBy('id_persuratan', 'DESC')->findAll()
        ];

        return view('admin/persuratan/index', $data);
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin/persuratan/create');
    }

    // SIMPAN
    public function store()
    {
        $this->persuratan->save([
            'nama'          => $this->request->getPost('nama'),
            'nik'           => $this->request->getPost('nik'),
            'jenis_surat'   => $this->request->getPost('jenis_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'status'        => 'pending',
        ]);

        return redirect()->to('/admin/persuratan')->with('success', 'Permohonan berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        return view('admin/persuratan/edit', [
            'persuratan' => $this->persuratan->find($id)
        ]);
    }

    // UPDATE
    public function update($id)
    {
        $this->persuratan->update($id, [
            'nama'          => $this->request->getPost('nama'),
            'nik'           => $this->request->getPost('nik'),
            'jenis_surat'   => $this->request->getPost('jenis_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/persuratan')->with('success', 'Data berhasil diperbarui');
    }

    // DELETE
    public function delete($id)
    {
        $this->persuratan->delete($id);

        return redirect()->to('/admin/persuratan')->with('success', 'Data berhasil dihapus');
    }
}
