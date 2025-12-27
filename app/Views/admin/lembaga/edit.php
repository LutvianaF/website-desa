<?= $this->extend('admin/template/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Lembaga Desa</h1>
</div>

<?php if (session()->getFlashdata('errors')): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $err): ?>
        <li><?= esc($err) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<div class="card shadow mb-4">
  <div class="card-body">
    <form action="<?= base_url('admin/lembaga/update/' . $lembaga['id_lembaga']) ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
        <input type="text" name="nama_lembaga" id="nama_lembaga" class="form-control"
               value="<?= old('nama_lembaga', $lembaga['nama_lembaga']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control"
               value="<?= old('jabatan', $lembaga['jabatan']) ?>">
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama Person</label>
        <input type="text" name="nama" id="nama" class="form-control"
               value="<?= old('nama', $lembaga['nama']) ?>">
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"><?= old('deskripsi', $lembaga['deskripsi']) ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label d-block">Gambar Saat Ini</label>
        <?php if (!empty($lembaga['gambar'])): ?>
          <img src="<?= base_url('uploads/' . esc($lembaga['gambar'])) ?>" 
               alt="<?= esc($lembaga['alt_gambar']) ?>"
               class="img-thumbnail mb-2"
               style="width: 100px; height: 100px; object-fit: cover;">
        <?php else: ?>
          <p class="text-muted">Belum ada gambar.</p>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar" id="gambar" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
      </div>
      
      <div class="mb-3">
        <label for="alt_gambar" class="form-label">Alt Gambar (Teks alternatif)</label>
        <input type="text" name="alt_gambar" id="alt_gambar" class="form-control"
               value="<?= old('alt_gambar', $lembaga['alt_gambar']) ?>">
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i> Update
      </button>
      <a href="<?= base_url('admin/lembaga') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Batal
      </a>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
