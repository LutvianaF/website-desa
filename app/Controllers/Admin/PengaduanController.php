<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use App\Models\KategoriPengaduanModel;

class PengaduanController extends BaseController
{
    protected $pengaduanModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
        $this->kategoriModel  = new KategoriPengaduanModel();
    }

    public function index()
    {
        $pengaduan = $this->pengaduanModel
            ->select('tb_pengaduan.*, tb_kategori_pengaduan.nama_kategori')
            ->join(
                'tb_kategori_pengaduan',
                'tb_kategori_pengaduan.id_kategori_pengaduan = tb_pengaduan.id_kategori_pengaduan',
                'left'
            )
            ->orderBy('tb_pengaduan.id_pengaduan', 'DESC')
            ->findAll();

        // Ambil daftar kategori
        $kategori = $this->kategoriModel
            ->orderBy('id_kategori_pengaduan', 'ASC')
            ->findAll();

        $data = [
            'title'     => 'Manajemen Pengaduan Masyarakat',
            'pengaduan' => $pengaduan,
            'kategori'  => $kategori
        ];

        return view('admin/pengaduan/index', $data);
    }

    public function kategori_store()
    {
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()
            ->to('/admin/pengaduan')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function kategori_update($id)
    {
        // Cek data
        if (!$this->kategoriModel->find($id)) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }

        // Validasi sederhana
        if (!$this->validate([
            'nama_kategori' => 'required|min_length[3]'
        ])) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()
            ->to('/admin/pengaduan')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function kategori_delete($id)
    {
        // Cek data
        if (!$this->kategoriModel->find($id)) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }

        $this->kategoriModel->delete($id);

        return redirect()
            ->to('/admin/pengaduan')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
