<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h2>Tambah Pengumuman</h2>
<form action="<?= base_url('admin/pengumuman/store') ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required></textarea>
  </div>
  <div class="mb-3">
    <label>Gambar</label>
    <input type="file" name="gambar" class="form-control">
  </div>
  <div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
