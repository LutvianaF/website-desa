<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="permohonan-surat">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="fw-bold">PERMOHONAN SURAT ONLINE</h3>
      <p class="text-muted">
        Layanan ini disediakan untuk mempermudah warga dalam mengurus berbagai
        surat administrasi desa tanpa harus datang langsung ke kantor desa.
        Silakan isi formulir di bawah ini dengan lengkap dan benar.
      </p>
    </div>

    <!-- Informasi Panduan -->
    <div class="alert alert-info mb-4" role="alert">
      📄 <strong>Panduan:</strong> Pastikan data yang Anda masukkan sesuai dengan identitas di KTP/KK.
      Permohonan akan diproses maksimal <strong>1x24 jam</strong> pada hari kerja.
    </div>

    <!-- Formulir Permohonan Surat -->
    <form action="<?= base_url('layanan/kirim_permohonan'); ?>" method="post" enctype="multipart/form-data" class="shadow-sm p-4 bg-light rounded">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama sesuai KTP" required />
        </div>
        <div class="col-md-6">
          <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
          <input type="text" id="nik" name="nik" class="form-control" maxlength="16" placeholder="16 digit NIK" required />
        </div>
        <div class="col-md-6">
          <label for="jenis_surat" class="form-label">Jenis Surat</label>
          <select id="jenis_surat" name="jenis_surat" class="form-select" required>
            <option value="">-- Pilih Jenis Surat --</option>
            <option value="domisili">Surat Keterangan Domisili</option>
            <option value="usaha">Surat Keterangan Usaha</option>
            <option value="tidak_mampu">Surat Keterangan Tidak Mampu</option>
            <option value="pengantar_nikah">Surat Pengantar Nikah</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="telepon" class="form-label">Nomor HP/WA Aktif</label>
          <input type="text" id="telepon" name="telepon" class="form-control" placeholder="0812xxxxxxx" required />
        </div>
        <div class="col-md-12">
          <label for="alamat" class="form-label">Alamat Lengkap</label>
          <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat sesuai KTP" required></textarea>
        </div>
        <div class="col-md-12">
          <label for="keperluan" class="form-label">Keperluan Permohonan</label>
          <textarea id="keperluan" name="keperluan" class="form-control" rows="3" placeholder="Tuliskan keperluan Anda..." required></textarea>
        </div>
        <div class="col-md-12">
          <label for="berkas" class="form-label">Unggah Berkas Pendukung (KTP/KK, dll)</label>
          <input type="file" id="berkas" name="berkas" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required />
          <small class="text-muted">Format: JPG, PNG, atau PDF. Maksimal 2 MB.</small>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn-bg px-4">Kirim Permohonan</button>
      </div>
    </form>

    <!-- Status Informasi -->
    <div class="mt-5 text-center">
      <h5 class="fw-semibold mb-3">Sudah mengajukan permohonan?</h5>
      <p class="text-muted mb-2">
        Anda dapat memantau status permohonan surat yang sudah dikirim melalui fitur berikut:
      </p>
      <a href="<?= base_url('layanan/cek-status'); ?>" class="btn-bg">Cek Status Permohonan</a>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
