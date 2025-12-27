<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-3">Tambah Data Wilayah</h3>

<form action="/admin/wilayah/store" method="post">
  <div class="mb-3">
    <label>Nama Wilayah</label>
    <input type="text" name="nama_wilayah" class="form-control" required>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Jumlah RT</label>
      <input type="number" name="jumlah_rt" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Jumlah RW</label>
      <input type="number" name="jumlah_rw" class="form-control" required>
    </div>
  </div>

  <div class="mb-3">
    <label>Luas (Ha)</label>
    <input type="text" name="luas" class="form-control">
  </div>

  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea>
  </div>

  <button class="btn btn-primary">Simpan</button>
  <a href="/admin/wilayah" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
