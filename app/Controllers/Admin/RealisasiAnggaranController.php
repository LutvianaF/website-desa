<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RealranModel;

class RealisasiAnggaranController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new RealranModel();
    }

    public function index()
    {
        $data['rows'] = $this->model->findAll();
        
        return view('admin/realisasi/index', $data);
    }

    public function create()
    {
        return view('admin/realisasi/create');
    }

    public function store()
    {
        $this->model->save([
            'bidang'            => $this->request->getPost('bidang'),
            'anggaran'          => $this->request->getPost('anggaran'),
            'realisasi'         => $this->request->getPost('realisasi'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tanggal_realisasi' => $this->request->getPost('tanggal_realisasi'),
        ]);

        return redirect()->to('/admin/realisasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['row'] = $this->model->find($id);
        return view('admin/realisasi/edit', $data);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'bidang'            => $this->request->getPost('bidang'),
            'anggaran'          => $this->request->getPost('anggaran'),
            'realisasi'         => $this->request->getPost('realisasi'),
            'deskripsi'         => $this->request->getPost('deskripsi'),
            'tanggal_realisasi' => $this->request->getPost('tanggal_realisasi'),
        ]);

        return redirect()->to('/admin/realisasi')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/realisasi')->with('success', 'Data berhasil dihapus');
    }
}