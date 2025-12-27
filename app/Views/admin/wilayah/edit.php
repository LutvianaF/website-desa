<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-3">Edit Data Wilayah</h3>

<form action="/admin/wilayah/update/<?= $w['id_wilayah'] ?>" method="post">
  <div class="mb-3">
    <label>Nama Wilayah</label>
    <input type="text" name="nama_wilayah" value="<?= $w['nama_wilayah'] ?>" class="form-control" required>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Jumlah RT</label>
      <input type="number" name="jumlah_rt" value="<?= $w['jumlah_rt'] ?>" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Jumlah RW</label>
      <input type="number" name="jumlah_rw" value="<?= $w['jumlah_rw'] ?>" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Luas (Ha)</label>
    <input type="text" name="luas" value="<?= $w['luas'] ?>" class="form-control">
  </div>

  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"><?= $w['deskripsi'] ?></textarea>
  </div>

  <button class="btn btn-warning">Update</button>
  <a href="/admin/wilayah" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
