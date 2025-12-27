<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LamanModel;

class LayananController extends BaseController
{
    protected $layanan;

    public function __construct()
    {
        $this->layanan = new LamanModel();
    }

    // LIST
    public function index()
    {
        $data = [
            'title' => 'Daftar Permohonan Surat',
            'data' => $this->layanan->orderBy('id_layanan', 'DESC')->findAll()
        ];

        return view('admin/layanan/index', $data);
    }

    // DETAIL
    public function detail($id)
    {
        return view('admin/layanan/detail', [
            'd' => $this->layanan->find($id)
        ]);
    }

    // UPDATE STATUS + EDIT
    public function update($id)
    {
        $this->layanan->update($id, [
            'status' => $this->request->getPost('status'),
            'keperluan' => $this->request->getPost('keperluan'),
            'jenis_surat' => $this->request->getPost('jenis_surat')
        ]);

        return redirect()->to('/admin/layanan')->with('success', 'Data diperbarui');
    }

    // DELETE
    public function delete($id)
    {
        $this->layanan->delete($id);

        return redirect()->to('/admin/layanan')->with('success', 'Data dihapus');
    }
}
