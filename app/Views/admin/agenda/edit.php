<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <h3 class="fw-bold mb-4">Edit Agenda</h3>

  <form action="<?= base_url('admin/agenda/update/'.$agenda['id']) ?>" method="post" enctype="multipart/form-data" class="bg-white shadow-sm p-4 rounded">
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" value="<?= esc($agenda['judul']) ?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"><?= esc($agenda['deskripsi']) ?></textarea>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" value="<?= esc($agenda['tanggal_mulai']) ?>" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" value="<?= esc($agenda['tanggal_selesai']) ?>" class="form-control" required>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Gambar Agenda</label><br>
      <?php if ($agenda['gambar']): ?>
        <img src="<?= base_url($agenda['gambar']) ?>" width="100" height="80" class="mb-2" style="object-fit:cover;border-radius:5px;">
      <?php endif; ?>
      <input type="file" name="gambar" class="form-control" accept="image/*">
      <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
    </div>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-success">Update</button>
      <a href="<?= base_url('admin/agenda') ?>" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
