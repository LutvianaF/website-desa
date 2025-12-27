<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3>Edit Realisasi Anggaran</h3>

<form action="<?= base_url('admin/realisasi/update/'.$row['id']) ?>" method="post">
  <div class="mb-3">
    <label>Bidang</label>
    <input type="text" name="bidang" class="form-control" value="<?= $row['bidang'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Tahun</label>
    <input type="date" name="tanggal_realisasi" class="form-control" value="<?= $row['bidang'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Anggaran</label>
    <input type="number" name="anggaran" class="form-control" value="<?= $row['anggaran'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Realisasi</label>
    <input type="number" name="realisasi" class="form-control" value="<?= $row['realisasi'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"><?= $row['deskripsi'] ?></textarea>
  </div>

  <button class="btn btn-success">Update</button>
  <a href="<?= base_url('admin/realisasi') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>