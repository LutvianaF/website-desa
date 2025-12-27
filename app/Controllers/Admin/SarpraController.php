<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SarprasModel;
use App\Models\PrasaranaModel;
use App\Models\TanahModel;

class SarpraController extends BaseController
{
    protected $sarpra;
    protected $prasarana;
    protected $tanah;

    public function __construct()
    {
        $this->sarpra = new SarprasModel();
        $this->prasarana = new PrasaranaModel();
        $this->tanah = new TanahModel();
    }

    public function index()
    {
        $data['title'] = 'Data Sarana & Prasarana';
        $data['sarpra'] = $this->sarpra->findAll();
        $data['prasarana'] = $this->prasarana->findAll();
        $data['tanah'] = $this->tanah->findAll();

        return view('admin/sarpra/index', $data);
    }

    public function create()
    {
        return view('admin/sarpra/create');
    }

    public function store()
    {
        $this->sarpra->save([
            'judul_sarana' => $this->request->getPost('judul_sarana'),
            'isi_sarana' => $this->request->getPost('isi_sarana'),
            'judul_prasarana' => $this->request->getPost('judul_prasarana'),
            'isi_prasarana' => $this->request->getPost('isi_prasarana'),
        ]);

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil ditambahkan.');
    }

    
    public function edit($id)
    {
        $data['data'] = $this->sarpra->find($id);

        return view('admin/sarpra/edit', $data);
    }

    public function update($id)
    {
        $this->sarpra->update($id, [
            'judul_sarana' => $this->request->getPost('judul_sarana'),
            'isi_sarana' => $this->request->getPost('isi_sarana'),
            'judul_prasarana' => $this->request->getPost('judul_prasarana'),
            'isi_prasarana' => $this->request->getPost('isi_prasarana'),
        ]);

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->sarpra->delete($id);

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil dihapus.');
    }    

    // PETA PRASARANA
    public function storePoint()
    {
        $foto = $this->request->getFile('foto_prasarana');
        $namaFoto = null;

        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/prasarana', $namaFoto);
        }

        $this->prasarana->save([
            'nama_prasarana'      => $this->request->getPost('nama'),
            'deskripsi_prasarana' => $this->request->getPost('deskripsi'),
            'lat_prasarana'       => $this->request->getPost('lat'),
            'long_prasarana'      => $this->request->getPost('lng'),
            'foto_prasarana'      => $namaFoto,
        ]);

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil ditambah.');
    }

    public function updatePoint($id)
    {
        $data = [
            'nama_prasarana'      => $this->request->getPost('nama'),
            'deskripsi_prasarana' => $this->request->getPost('deskripsi'),
            'lat_prasarana'       => $this->request->getPost('lat'),
            'long_prasarana'      => $this->request->getPost('lng'),
        ];

        $foto = $this->request->getFile('foto_prasarana');
        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/prasarana', $namaFoto);
            $data['foto_prasarana'] = $namaFoto;
        }

        $this->prasarana->update($id, $data);

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil diedit.');
    }

    public function deletePoint($id)
    {
        $data = $this->prasarana->find($id);

        if ($data && $data['foto_prasarana']) {
            $path = 'uploads/prasarana/' . $data['foto_prasarana'];
            if (file_exists($path)) unlink($path);
        }

        $this->prasarana->delete($id);
        $this->tanah->where('id_prasarana', $id)->delete();

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil dihapus.');
    }


    // PETA TANAH
    public function storeTanah()
    {
        $foto = $this->request->getFile('foto_tanah');
        $namaFoto = null;

        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/tanah', $namaFoto);
        }

        $this->tanah->save([
            'nama_tanah'        => $this->request->getPost('nama'),
            'koordinat'         => $this->request->getPost('koordinat'),
            'foto_tanah'        => $namaFoto,
            'deskripsi_tanah'   => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil ditambah.');
    }

    public function updateTanah($id)
    {
        $this->tanah->save([
            'id_tanah'      => $id, 
            'nama_tanah'    => $this->request->getPost('nama'),
            'koordinat'    => $this->request->getPost('koordinat'),
            'deskripsi_tanah'    => $this->request->getPost('deskripsi'),
        ]);

        $foto = $this->request->getFile('foto_tanah');
        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/tanah', $namaFoto);
            $data['foto_tanah'] = $namaFoto;
        }

        return redirect()->to('/admin/sarpra')
            ->with('success', 'Data tanah berhasil diperbarui.');
    }

    public function deleteTanah($id)
    {
        $data = $this->tanah->find($id);

        if ($data && $data['foto_tanah']) {
            $path = 'uploads/tanah/' . $data['foto_tanah'];
            if (file_exists($path)) unlink($path);
        }

        $this->tanah->delete($id);
        return redirect()->to('/admin/sarpra')->with('success', 'Data berhasil dihapus.');
    }
}
