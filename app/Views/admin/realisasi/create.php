<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3>Tambah Realisasi Anggaran</h3>

<form action="<?= base_url('admin/realisasi/store') ?>" method="post">
  <div class="mb-3">
    <label>Bidang</label>
    <input type="text" name="bidang" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Tahun</label>
    <input type="date" name="tanggal_realisasi" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Anggaran</label>
    <input type="number" name="anggaran" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Realisasi</label>
    <input type="number" name="realisasi" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea>
  </div>

  <button class="btn btn-success">Simpan</button>
  <a href="<?= base_url('admin/realisasi') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>