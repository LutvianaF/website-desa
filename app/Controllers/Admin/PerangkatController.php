<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PerangkatModel;

class PerangkatController extends BaseController
{
    public function index()
    {
        $model = new PerangkatModel();
        $data['perangkat'] = $model->findAll();

        return view('admin/perangkat/index', $data);
    }

    public function create()
    {
        return view('admin/perangkat/create');
    }

    public function store()
    {
        $model = new PerangkatModel();

        $foto = $this->request->getFile('foto');
        $fileName = null;

        if ($foto->isValid() && !$foto->hasMoved()) {
            $fileName = $foto->getRandomName();
            $foto->move('uploads/perangkat', $fileName);
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alt_foto' => $this->request->getPost('alt_foto'),
            'foto' => $fileName
        ]);

        return redirect()->to('/admin/perangkat')->with('success', 'Perangkat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new PerangkatModel();
        $data['perangkat'] = $model->find($id);

        return view('admin/perangkat/edit', $data);
    }

    public function update($id)
    {
        $model = new PerangkatModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alt_foto' => $this->request->getPost('alt_foto'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fileName = $foto->getRandomName();
            $foto->move('uploads/perangkat', $fileName);

            // hapus foto lama
            $old = $model->find($id);
            if ($old['foto'] && file_exists('uploads/perangkat/' . $old['foto'])) {
                unlink('uploads/perangkat/' . $old['foto']);
            }

            $data['foto'] = $fileName;
        }

        $model->update($id, $data);

        return redirect()->to('/admin/perangkat')->with('success', 'Perangkat berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new PerangkatModel();
        $item = $model->find($id);

        if ($item['foto'] && file_exists('uploads/perangkat/' . $item['foto'])) {
            unlink('uploads/perangkat/' . $item['foto']);
        }

        $model->delete($id);

        return redirect()->to('/admin/perangkat')->with('success', 'Perangkat berhasil dihapus.');
    }
}
