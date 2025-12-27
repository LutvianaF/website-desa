<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\APBDesModel;
use App\Models\RealranModel;
use App\Models\PendapatanDesaModel;
use App\Models\PembiayaanDesaModel;

class APBDesController extends BaseController
{
    public function index()
    {
        $apbdesModel         = new APBDesModel();
        $realranModel        = new RealranModel();
        $pendapatanModel     = new PendapatanDesaModel();
        $pembiayaanDesaModel = new PembiayaanDesaModel();

        $tahun = date('Y');
        $start  = $tahun . '-01-01';
        $end    = $tahun . '-12-31';

        // ==========================
        //  APBDes utama (ringkasan)
        // ==========================
        $apbdes = $apbdesModel
            ->orderBy('tahun', 'DESC')
            ->first();

        // ==========================
        //  REALISASI BELANJA DESA
        // ==========================
        $realisasi = $realranModel->findAll();

        $totalAnggaran  = 0;
        $totalRealisasi = 0;

        foreach ($realisasi as $row) {
            $totalAnggaran  += (float) $row['anggaran'];
            $totalRealisasi += (float) $row['realisasi'];
        }

        $totalPersentase = $totalAnggaran > 0
            ? round(($totalRealisasi / $totalAnggaran) * 100, 2)
            : 0;

        // ==========================
        //  PENDAPATAN DESA
        // ==========================
        $pendapatan = $pendapatanModel
            ->where('tanggal_pendapatan >=', $start)
            ->where('tanggal_pendapatan <=', $end)
            ->orderBy('urutan', 'ASC')
            ->findAll();

        $totalPendapatan = 0;
        foreach ($pendapatan as $row) {
            $totalPendapatan += (float) $row['jumlah'];
        }

        // ==========================
        //  PEMBIAYAAN DESA
        // ==========================
        $pembiayaan = $pembiayaanDesaModel
            ->where('tanggal_pembiayaan >=', $start)
            ->where('tanggal_pembiayaan <=', $end)
            ->orderBy('urutan', 'ASC')
            ->findAll();

        $totalPembiayaanNetto = 0;
        foreach ($pembiayaan as $row) {
            // Untuk saat ini anggap semua positif => dijumlahkan
            // Kalau nanti ada kolom "tipe" (penerimaan/pengeluaran),
            // bisa dibedakan hitungnya.
            $totalPembiayaanNetto += (float) $row['jumlah'];
        }

        return view('APBDes', [
            'apbdes'                => $apbdes,

            // Belanja / Realisasi
            'realisasi'             => $realisasi,
            'totalAnggaran'         => $totalAnggaran,
            'totalRealisasi'        => $totalRealisasi,
            'totalPersentase'       => $totalPersentase,

            // Pendapatan
            'pendapatan'            => $pendapatan,
            'totalPendapatan'       => $totalPendapatan,

            // Pembiayaan
            'pembiayaan'            => $pembiayaan,
            'totalPembiayaanNetto'  => $totalPembiayaanNetto,
        ]);
    }
}
