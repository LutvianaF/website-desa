<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="persuratan">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">Layanan Persuratan</h2>
      <p class="text-muted">Ajukan surat keterangan secara online dengan mudah dan cepat</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <form class="bg-white p-4 rounded shadow-sm">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap Anda" required>
          </div>

          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan" required>
          </div>

          <div class="mb-3">
            <label for="jenisSurat" class="form-label">Jenis Surat</label>
            <select class="form-select" id="jenisSurat" required>
              <option value="">Pilih Jenis Surat</option>
              <option>Surat Keterangan Domisili</option>
              <option>Surat Keterangan Usaha</option>
              <option>Surat Keterangan Tidak Mampu</option>
              <option>Surat Pengantar SKCK</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan Tambahan</label>
            <textarea class="form-control" id="keterangan" rows="3" placeholder="Tuliskan keterangan tambahan..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100">Kirim Permohonan</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
