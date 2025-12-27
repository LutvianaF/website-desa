<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-3">Tambah Sejarah Desa</h3>

<!-- Tampilkan error validasi -->
<?php if(isset($validation)): ?>
<div class="alert alert-danger">
    <?= $validation->listErrors() ?>
</div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="<?= base_url('admin/sejarah/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= old('judul') ?>" required>
            </div>

            <!-- Gambar -->
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
                <small class="text-muted">Format: jpg, jpeg, png</small>
            </div>

            <!-- Isi Sejarah -->
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="isi" class="form-control" rows="6" required><?= old('isi') ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="<?= base_url('admin/sejarah') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
