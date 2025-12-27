<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AgendaModel;

class AgendaController extends BaseController
{
    protected $agendaModel;

    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Agenda Desa',
            'agenda' => $this->agendaModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/agenda/index', $data);
    }

    public function create()
    {
        return view('admin/agenda/create');
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $fileName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/agenda', $fileName);
        }

        $this->agendaModel->insert([
            'judul'            => $this->request->getPost('judul'),
            'slug'            => url_title($this->request->getPost('judul'), '-', true),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'tanggal_mulai'    => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai'  => $this->request->getPost('tanggal_selesai'),
            'alt_gambar'       => $this->request->getPost('judul'),
            'gambar'           => $fileName, 
        ]);

        return redirect()->to(base_url('admin/agenda'))->with('success', 'Agenda berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['agenda'] = $this->agendaModel->find($id);
        return view('admin/agenda/edit', $data);
    }

    public function update($id)
    {
        $agenda = $this->agendaModel->find($id);
        $fileName = $agenda['gambar'];

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/agenda', $newName);
            $fileName = $newName;
        }

        $this->agendaModel->update($id, [
            'judul'            => $this->request->getPost('judul'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'tanggal_mulai'    => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai'  => $this->request->getPost('tanggal_selesai'),
            'alt_gambar'       => $this->request->getPost('judul'),
            'gambar'           => $fileName,
        ]);

        return redirect()->to(base_url('admin/agenda'))->with('success', 'Agenda berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->agendaModel->delete($id);
        return redirect()->to(base_url('admin/agenda'))->with('success', 'Agenda berhasil dihapus');
    }
}
