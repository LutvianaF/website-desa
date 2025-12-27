<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="informasila">
  <div class="container">
    <div class="text-center mb-4">
      <h3 class="mb-3">INFORMASI LAYANAN</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>

    <div class="row g-4 mb-4">
      <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 bg-light">
        <div class="card-body">
        <h6 class="fw-semibold text-primary mb-3">Jenis Surat yang Umum Dilayani</h6>
        <div class="li-card" onclick="toggleLi('d1')">
          Surat Keterangan Domisili (SKD)
          <span id="icon-d1" class="arrow">›</span>
        </div>
        <div id="d1" class="li-detail">
          Detail SKD:  
          Biasanya digunakan untuk keperluan pendaftaran sekolah, kerja, atau kebutuhan administrasi lainnya.
        </div>

        <div class="li-card" onclick="toggleLi('d2')">
          Surat Keterangan Usaha (SKU)
          <span id="icon-d2" class="arrow">›</span>
        </div>
        <div id="d2" class="li-detail">
          Detail SKU:  
          Dibutuhkan untuk izin usaha, pengajuan bantuan UMKM, hingga pengurusan perbankan.
        </div>

        <div class="li-card" onclick="toggleLi('d3')">
          Surat Keterangan Tidak Mampu (SKTM)
          <span id="icon-d3" class="arrow">›</span>
        </div>
        <div id="d3" class="li-detail">
          Detail SKTM:  
          Digunakan untuk bantuan sosial, pendidikan, kesehatan, dsb.
        </div>
        <div class="li-card" onclick="toggleLi('d4')">
          Surat Pengantar Pembuatan KTP / KK / Akta
          <span id="icon-d4" class="arrow">›</span>
        </div>
        <div id="d4" class="li-detail">
          Digunakan sebagai syarat pengurusan dokumen identitas seperti KTP, KK, dan akta kelahiran.
        </div>

        <div class="li-card" onclick="toggleLi('d5')">
          Surat Keterangan Kelahiran / Kematian
          <span id="icon-d5" class="arrow">›</span>
        </div>
        <div id="d5" class="li-detail">
          Surat resmi dari desa untuk administrasi kelahiran atau kematian warga.
        </div>

        <div class="li-card" onclick="toggleLi('d6')">
          Surat Keterangan Pindah / Datang Penduduk
          <span id="icon-d6" class="arrow">›</span>
        </div>
        <div id="d6" class="li-detail">
          Dibutuhkan untuk proses perpindahan domisili baik keluar maupun masuk wilayah desa.
        </div>

        <div class="li-card" onclick="toggleLi('d7')">
          Surat Pengantar Nikah (N1 - N4)
          <span id="icon-d7" class="arrow">›</span>
        </div>
        <div id="d7" class="li-detail">
          Dokumen persiapan pernikahan sesuai prosedur administratif dari desa hingga KUA.
        </div>

        <div class="li-card" onclick="toggleLi('d8')">
          Surat Keterangan Tanah / Waris
          <span id="icon-d8" class="arrow">›</span>
        </div>
        <div id="d8" class="li-detail">
          Digunakan untuk pembuktian kepemilikan tanah atau hak waris atas properti keluarga.
        </div>

        <div class="li-card" onclick="toggleLi('d9')">
          Surat Rekomendasi Lainnya
          <span id="icon-d9" class="arrow">›</span>
        </div>
        <div id="d9" class="li-detail">
          Meliputi berbagai rekomendasi administratif sesuai kebutuhan warga.
        </div>
        <!-- Tambahkan item lain sesuai kebutuhan -->
        </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 bg-light">
          <div class="card-body">
            <h6 class="fw-semibold text-primary mb-3">Proses Pelayanan</h6>
            <ol class="list-group list-group-numbered">
              <li class="list-group-item">
                Warga mengajukan permohonan ke RT/RW untuk surat pengantar
              </li>
              <li class="list-group-item">Membawa pengantar & berkas ke Kantor Desa</li>
              <li class="list-group-item">Petugas desa memverifikasi data</li>
              <li class="list-group-item">
                Surat dibuat, ditandatangani Kepala Desa atau Sekretaris Desa
              </li>
              <li class="list-group-item">
                Surat bisa langsung diambil warga (biasanya 1 hari kerja)
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 bg-light">
          <div class="card-body">
            <h6 class="fw-semibold text-primary mb-3">
              Syarat Umum Pengajuan Surat
            </h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Fotokopi KTP & KK</li>
              <li class="list-group-item">Surat pengantar RT/RW</li>
              <li class="list-group-item">
                Dokumen pendukung (akta lahir, surat nikah, ijazah, dll sesuai kebutuhan)
              </li>
              <li class="list-group-item">
                Mengisi formulir permohonan di Kantor Desa
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <h6 class="fw-semibold text-primary mb-3">Jam Layanan (Umumnya)</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Senin - Jumat : 08.00 - 14.00</li>
              <li class="list-group-item">Istirahat : 12.00 - 13.00</li>
              <li class="list-group-item">
                Sabtu - Minggu : Libur (kecuali ada pelayanan darurat)
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>