<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h2>Edit Berita</h2>

<form action="<?= base_url('admin/berita/update/'. $berita['id_berita']) ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" value="<?= esc($berita['judul']) ?>" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="5" required><?= esc($berita['deskripsi']) ?></textarea>
  </div>
  <div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control" value="<?= $berita['tanggal'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Gambar Lama</label><br>
    <?php if($berita['gambar']): ?>
      <img src="<?= base_url('/' . $berita['gambar']) ?>" width="120"><br>
    <?php endif; ?>
    <!-- <label>Ganti Gambar</label>
    <input type="file" name="gambar" class="form-control"> -->
  </div>
  <button type="submit" class="btn btn-success">Update</button>
  <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
