<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\APBDesModel;
use App\Models\PendapatanDesaModel;
use App\Models\PembiayaanDesaModel;
use App\Models\RealranModel;

class ApbdesController extends BaseController
{
    protected $apbdes;
    protected $pendapatan;
    protected $pembiayaan;
    protected $realran;

    public function __construct()
    {
        $this->apbdes      = new APBDesModel();
        $this->pendapatan  = new PendapatanDesaModel();
        $this->pembiayaan  = new PembiayaanDesaModel();
        $this->realran     = new RealranModel();
    }

    /* ============================================================
     *                  CRUD APBDES (DATA UTAMA)
     * ============================================================ */

    public function index()
    {
        $apbdesList = $this->apbdes->orderBy('id_apbdes', 'DESC')->findAll();
        $id_apbdes = count($apbdesList) > 0 ? $apbdesList[0]['id_apbdes'] : null;
        $data = [
            'title'       => 'Data APBDes',
            'apbdes'      => $apbdesList,
            'id_apbdes'   => $id_apbdes,
            'pendapatan'  => $this->pendapatan->orderBy('urutan', 'ASC')->findAll(),
            'pembiayaan'  => $this->pembiayaan->orderBy('urutan', 'ASC')->findAll(),
        ];

        return view('admin/apbdes/index', $data);
    }

    public function create()
    {
        $tahun = date('Y');
        $start  = $tahun . '-01-01';
        $end    = $tahun . '-12-31';

        // Hitung total pendapatan
        $sumPendapatan = $this->pendapatan
            ->where('tanggal_pendapatan >=', $start)
            ->where('tanggal_pendapatan <=', $end)
            ->selectSum('jumlah')
            ->first();
        $totalPendapatan = $sumPendapatan['jumlah'] ?? 0;

        // Hitung total belanja (dari realisasi anggaran)
        $sumBelanja = $this->realran
            ->where('tanggal_realisasi >=', $start)
            ->where('tanggal_realisasi <=', $end)
            ->selectSum('realisasi')
            ->first();
        $totalBelanja = $sumBelanja['realisasi'] ?? 0;

        // Hitung total pembiayaan
        $sumPembiayaan = $this->pembiayaan
            ->where('tanggal_pembiayaan >=', $start)
            ->where('tanggal_pembiayaan <=', $end)
            ->selectSum('jumlah')
            ->first();
        $totalPembiayaan = $sumPembiayaan['jumlah'] ?? 0;

        // Hitung SILPA: Pendapatan + Pembiayaan - Belanja
        $silpa = $totalPendapatan + $totalPembiayaan - $totalBelanja;

        $data = [
            'title'             => 'Tambah Data APBDes',
            'totalPendapatan'   => $totalPendapatan,
            'totalBelanja'      => $totalBelanja,
            'totalPembiayaan'   => $totalPembiayaan,
            'silpa'             => $silpa,
        ];

        return view('admin/apbdes/create', $data);
    }

    public function store()
    {
        $tahun = $this->request->getPost('tahun');
        $start = $tahun . '-01-01';
        $end   = $tahun . '-12-31';
        // Hitung ulang total dari DB (jaga-jaga kalau data berubah)
        $sumPendapatan = $this->pendapatan
            ->where('tanggal_pendapatan >=', $start)
            ->where('tanggal_pendapatan <=', $end)
            ->selectSum('jumlah')
            ->first();
        $totalPendapatan = $sumPendapatan['jumlah'] ?? 0;

        $sumBelanja = $this->realran
            ->where('tanggal_realisasi >=', $start)
            ->where('tanggal_realisasi <=', $end)
            ->selectSum('realisasi')
            ->first();
        $totalBelanja = $sumBelanja['realisasi'] ?? 0;

        $sumPembiayaan = $this->pembiayaan
            ->where('tanggal_pembiayaan >=', $start)
            ->where('tanggal_pembiayaan <=', $end)
            ->selectSum('jumlah')
            ->first();
        $totalPembiayaan = $sumPembiayaan['jumlah'] ?? 0;

        $sumAnggaran = $this->realran
            ->where('tanggal_realisasi >=', $start)
            ->where('tanggal_realisasi <=', $end)
            ->selectSum('anggaran')
            ->first();
        $totalRealisasiAnggaran = $sumAnggaran['anggaran'] ?? 0;
        $silpa = $totalPendapatan + $totalPembiayaan - $totalBelanja;

        $this->apbdes->save([
            'tahun'                     => $this->request->getPost('tahun'),
            'deskripsi'                 => $this->request->getPost('deskripsi'),
            'total_pendapatan'          => $totalPendapatan,
            'total_rencana_belanja'     => $totalRealisasiAnggaran,
            'total_belanja'             => $totalBelanja,
            'total_pembiayaan'          => $totalPembiayaan,
            'silpa'                     => $silpa,
        ]);

        return redirect()->to('/admin/apbdes')
            ->with('success', 'Data APBDes berhasil ditambahkan!');
    }

    public function perbarui($id)
    {
        $tahun = date('Y');
        $start  = $tahun . '-01-01';
        $end    = $tahun . '-12-31';
        // Cari data APBDes dulu
        $row = $this->apbdes->find($id);

        if (!$row) {
            return redirect()->to('/admin/apbdes')
                ->with('error', 'Data APBDes tidak ditemukan.');
        }

        // Hitung ulang total pendapatan
        $sumPendapatan   = $this->pendapatan
        ->where('tanggal_pendapatan >=', $start)
        ->where('tanggal_pendapatan <=', $end)
        ->selectSum('jumlah')->first();
        $totalPendapatan = $sumPendapatan['jumlah'] ?? 0;

        // Hitung ulang total belanja (dari realisasi anggaran)
        $sumBelanja   = $this->realran
        ->where('tanggal_realisasi >=', $start)
        ->where('tanggal_realisasi <=', $end)
        ->selectSum('realisasi')
        ->first();
        $totalBelanja = $sumBelanja['realisasi'] ?? 0;

        // Hitung ulang total pembiayaan
        $sumPembiayaan   = $this->pembiayaan
        ->where('tanggal_pembiayaan >=', $start)
        ->where('tanggal_pembiayaan <=', $end)
        ->selectSum('jumlah')
        ->first();
        $totalPembiayaan = $sumPembiayaan['jumlah'] ?? 0;

        // Hitung ulang total realisasi anggaran
        $sumAnggaran   = $this->realran
        ->where('tanggal_realisasi >=', $start)
        ->where('tanggal_realisasi <=', $end)
        ->selectSum('anggaran')
        ->first();
        $totalRealisasiAnggaran = $sumAnggaran['anggaran'] ?? 0;

        // Hitung SILPA = Pendapatan + Pembiayaan - Belanja
        $silpa = $totalPendapatan + $totalPembiayaan - $totalBelanja;

        // Update baris APBDes ini dengan nilai terbaru
        $this->apbdes->update($id, [
            'total_pendapatan'          => $totalPendapatan,
            'total_rencana_belanja'     => $totalRealisasiAnggaran,
            'total_belanja'             => $totalBelanja,
            'total_pembiayaan'          => $totalPembiayaan,
            'silpa'                     => $silpa,
            // kalau mau sekalian update deskripsi / tahun, bisa ditambah di sini
        ]);

        return redirect()->to('/admin/apbdes')
            ->with('success', 'Data APBDes berhasil diperbarui dari data pendapatan, belanja, dan pembiayaan terkini.');
    }


    public function edit($id)
    {
        $row = $this->apbdes->find($id);

        if (!$row) {
            return redirect()->to('/admin/apbdes')->with('error', 'Data APBDes tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Data APBDes',
            'row'   => $row,
        ];

        return view('admin/apbdes/edit', $data);
    }

    public function update($id)
    {
        // Kalau mau tetap otomatis, bisa hitung ulang lagi di sini
        $sumPendapatan = $this->pendapatan->selectSum('jumlah')->first();
        $totalPendapatan = $sumPendapatan['jumlah'] ?? 0;

        $sumBelanja = $this->realran->selectSum('realisasi')->first();
        $totalBelanja = $sumBelanja['realisasi'] ?? 0;

        $sumAnggaran = $this->realran->selectSum('anggaran')->first();
        $totalAnggaran = $sumAnggaran['anggaran'] ?? 0;

        $sumPembiayaan = $this->pembiayaan->selectSum('jumlah')->first();
        $totalPembiayaan = $sumPembiayaan['jumlah'] ?? 0;

        $silpa = $totalPendapatan + $totalPembiayaan - $totalBelanja;

        $this->apbdes->update($id, [
            'tahun'                     => $this->request->getPost('tahun'),
            'deskripsi'                 => $this->request->getPost('deskripsi'),
            'total_pendapatan'          => $totalPendapatan,
            'total_rencana_belanja'     => $totalAnggaran,
            'total_belanja'             => $totalBelanja,
            'total_pembiayaan'          => $totalPembiayaan,
            'silpa'                     => $silpa,
        ]);

        return redirect()->to('/admin/apbdes')
            ->with('success', 'Data APBDes berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->apbdes->delete($id);

        return redirect()->to('/admin/apbdes')
            ->with('success', 'Data APBDes berhasil dihapus!');
    }


    /* ============================================================
     *           CRUD PENDAPATAN DESA (DALAM HALAMAN APBDES)
     * ============================================================ */

    public function pendapatan_store()
    {
        $this->pendapatan->save([
            'id_apbdes'             => $this->request->getPost('id_apbdes'),
            'kategori'              => $this->request->getPost('kategori'),
            'jumlah'                => $this->request->getPost('jumlah'),
            'keterangan'            => $this->request->getPost('keterangan'),
            'urutan'                => $this->request->getPost('urutan'),
            'tanggal_pendapatan'    => $this->request->getPost('tanggal_pendapatan'),
        ]);

        return redirect()->to('/admin/apbdes')->with('success', 'Pendapatan Desa berhasil ditambahkan!');
    }

    public function pendapatan_update($id)
    {
        $this->pendapatan->update($id, [
            'kategori'              => $this->request->getPost('kategori'),
            'jumlah'                => $this->request->getPost('jumlah'),
            'keterangan'            => $this->request->getPost('keterangan'),
            'urutan'                => $this->request->getPost('urutan'),
            'tanggal_pendapatan'    => $this->request->getPost('tanggal_pendapatan'),
        ]);

        return redirect()->to('/admin/apbdes')->with('success', 'Pendapatan Desa berhasil diupdate!');
    }

    public function pendapatan_delete($id)
    {
        $this->pendapatan->delete($id);

        return redirect()->to('/admin/apbdes')->with('success', 'Pendapatan Desa berhasil dihapus!');
    }

    /* ============================================================
     *          CRUD PEMBIAYAAN DESA (DALAM HALAMAN APBDES)
     * ============================================================ */

    public function pembiayaan_store()
    {
        $this->pembiayaan->save([
            'id_apbdes'             => $this->request->getPost('id_apbdes'),
            'uraian'                => $this->request->getPost('uraian'),
            'jumlah'                => $this->request->getPost('jumlah'),
            'keterangan'            => $this->request->getPost('keterangan'),
            'urutan'                => $this->request->getPost('urutan'),
            'tanggal_pembiayaan'     => $this->request->getPost('tanggal_pembiayaan'),
        ]);

        return redirect()->to('/admin/apbdes')->with('success', 'Pembiayaan Desa berhasil ditambahkan!');
    }

    public function pembiayaan_update($id)
    {
        $this->pembiayaan->update($id, [
            'uraian'                => $this->request->getPost('uraian'),
            'jumlah'                => $this->request->getPost('jumlah'),
            'keterangan'            => $this->request->getPost('keterangan'),
            'urutan'                => $this->request->getPost('urutan'),
            'tanggal_pembiayaan'    => $this->request->getPost('tanggal_pembiayaan'),
        ]);

        return redirect()->to('/admin/apbdes')->with('success', 'Pembiayaan Desa berhasil diupdate!');
    }

    public function pembiayaan_delete($id)
    {
        $this->pembiayaan->delete($id);

        return redirect()->to('/admin/apbdes')->with('success', 'Pembiayaan Desa berhasil dihapus!');
    }
}
