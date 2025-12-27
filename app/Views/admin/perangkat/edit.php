<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3 fw-bold">Edit Perangkat Desa</h3>

<form action="<?= base_url('admin/perangkat/update/'.$perangkat['id']) ?>" method="post" enctype="multipart/form-data">

  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= esc($perangkat['nama']) ?>" required>
  </div>

  <div class="mb-3">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" value="<?= esc($perangkat['jabatan']) ?>" required>
  </div>

  <div class="mb-3">
    <label>ALT Foto</label>
    <input type="text" name="alt_foto" class="form-control" value="<?= esc($perangkat['alt_foto']) ?>">
  </div>

  <div class="mb-3">
    <label>Foto Saat Ini</label><br>
    <img src="<?= base_url('uploads/perangkat/'.$perangkat['foto']) ?>" width="80" class="rounded mb-2">
    <input type="file" name="foto" class="form-control">
  </div>

  <button class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>
