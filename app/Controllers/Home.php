<?php

namespace App\Controllers;

use App\Models\SejarahModel;
use App\Models\VisimisiModel;
use App\Models\StrukturModel;
use App\Models\PerangkatModel;
use App\Models\BeritaModel;
use App\Models\PengumumanModel;
use App\Models\AgendaModel;
use App\Models\PendudukModel;
use App\Models\WilayahModel;
use App\Models\LembagaModel;
use App\Models\SarprasModel;
use App\Models\APBDesModel;
use App\Models\RealranModel;
use App\Models\PembangunanModel;
use App\Models\KategoriPengaduanModel;
use App\Models\MapModel;

class Home extends BaseController
{
    public function index()
    {
        // === Sejarah ===
        $sejarahModel = new SejarahModel();
        $data['sejarah'] = $sejarahModel->first();

        $model = new VisimisiModel();
        $data['vimi'] = $model->first();

        $model = new StrukturModel();
        $data['struktur'] = $model->findAll();

        $model = new PerangkatModel();
        $data['perangkat'] = $model->findAll();

        $model = new BeritaModel();
        $data['berita'] = $model->orderBy('tanggal', 'DESC')->findAll(6);

        // === Pengumuman (4 terbaru) ===
        $pengumumanModel = new PengumumanModel();
        $data['pengumuman'] = $pengumumanModel
            ->orderBy('tanggal', 'DESC')
            ->limit(4)
            ->find();

        $agendaModel = new AgendaModel();
        $data['agenda'] = $agendaModel->orderBy('tanggal_mulai', 'DESC')->findAll();

        $wilayahModel = new WilayahModel();
        $data['wilayah'] = $wilayahModel->findAll();

        $model = new LembagaModel();
        $data['lembaga'] = $model->findAll();

        $model = new SarprasModel();
        $data['sarpras'] = $model->findAll();

        $apbdesModel = new APBDesModel();
        $apbdes = $apbdesModel->orderBy('tahun', 'DESC')->first();

        // Jika ada data APBDes, hitung sisa anggaran
        if ($apbdes) {
            $sisaAnggaran = ($apbdes['total_pendapatan'] + $apbdes['total_pembiayaan']) - $apbdes['total_belanja'];
        } else {
            $apbdes = [];
            $sisaAnggaran = 0;
        }

        $data['apbdes'] = $apbdes;
        $data['sisa_anggaran'] = $sisaAnggaran;

        $model = new RealranModel();
        $data['realisasi'] = $model->findAll();

        $model = new PembangunanModel();
        $data['pembangunan'] = $model->orderBy('created_at', 'DESC')->findAll();
        
        $model = new KategoriPengaduanModel();
        $data['kategori_pengaduan'] = $model
                ->orderBy('nama_kategori', 'ASC')
                ->findAll();

        return view('index', $data);
    }
}
