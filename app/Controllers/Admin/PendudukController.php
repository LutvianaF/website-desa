<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;

class PendudukController extends BaseController
{
    protected $penduduk;

    public function __construct()
    {
        $this->penduduk = new PendudukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Penduduk',
            'penduduk' => $this->penduduk->orderBy('id_penduduk', 'DESC')->findAll()
        ];
        return view('admin/penduduk/index', $data);
    }

    public function create()
    {
        return view('admin/penduduk/create');
    }

    public function store()
    {
        $validated = $this->validate([
            'nik'            => 'required|min_length[10]|max_length[20]|is_unique[tb_penduduk.nik]',
            'nama'           => 'required',
            'jenis_kelamin'  => 'required|in_list[Laki-laki,Perempuan]',
            'dusun'          => 'required',
            'status_keluarga'=> 'required|in_list[Kepala Keluarga,Anggota]',
            'pekerjaan'      => 'permit_empty|max_length[100]'
        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $this->penduduk->save([
            'nik'             => $this->request->getPost('nik'),
            'nama'            => $this->request->getPost('nama'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'dusun'           => $this->request->getPost('dusun'),
            'pekerjaan'       => $this->request->getPost('pekerjaan'),
            'status_keluarga' => $this->request->getPost('status_keluarga'),
        ]);

        return redirect()->to('/admin/penduduk')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penduduk = $this->penduduk->find($id);

        if (!$penduduk) {
            return redirect()->to('/admin/penduduk')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/penduduk/edit', ['penduduk' => $penduduk]);
    }

    public function update($id)
    {
        $penduduk = $this->penduduk->find($id);
        if (!$penduduk) {
            return redirect()->to('/admin/penduduk')->with('error', 'Data tidak ditemukan');
        }

        // Validasi nik harus tidak duplikat kecuali miliknya sendiri
        $nikRule = ($penduduk['nik'] == $this->request->getPost('nik'))
            ? 'required'
            : 'required|is_unique[tb_penduduk.nik]';

        $validated = $this->validate([
            'nik'             => $nikRule,
            'nama'            => 'required',
            'jenis_kelamin'   => 'required|in_list[Laki-laki,Perempuan]',
            'dusun'           => 'required',
            'status_keluarga' => 'required|in_list[Kepala Keluarga,Anggota]',
            'pekerjaan'       => 'permit_empty|max_length[100]'
        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $this->penduduk->update($id, [
            'nik'             => $this->request->getPost('nik'),
            'nama'            => $this->request->getPost('nama'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'dusun'           => $this->request->getPost('dusun'),
            'pekerjaan'       => $this->request->getPost('pekerjaan'),
            'status_keluarga' => $this->request->getPost('status_keluarga'),
        ]);

        return redirect()->to('/admin/penduduk')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->penduduk->delete($id);
        return redirect()->to('/admin/penduduk')->with('success', 'Data berhasil dihapus');
    }
}
