<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3 fw-bold">Tambah Perangkat Desa</h3>

<form action="<?= base_url('admin/perangkat/store') ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>ALT Foto</label>
    <input type="text" name="alt_foto" class="form-control">
  </div>

  <div class="mb-3">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control">
  </div>

  <button class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('admin/perangkat') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
