<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-3">Tambah Visi & Misi</h3>

<!-- Error Validasi -->
<?php if(isset($validation)): ?>
<div class="alert alert-danger">
    <?= $validation->listErrors() ?>
</div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="<?= base_url('admin/visimisi/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Visi -->
            <div class="mb-3">
                <label class="form-label fw-bold">Visi</label>
                <textarea name="visi" class="form-control" rows="4" required><?= old('visi') ?></textarea>
            </div>

            <!-- Misi -->
            <div class="mb-3">
                <label class="form-label fw-bold">Misi</label>
                <textarea name="misi" class="form-control" rows="6" required><?= old('misi') ?></textarea>
            </div>

            <!-- Gambar -->
            <div class="mb-3">
                <label class="form-label fw-bold">Gambar (opsional)</label>
                <input type="file" name="gambar" class="form-control">
                <small class="text-muted">Format: JPG, JPEG, PNG | Maks 2MB</small>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="<?= base_url('admin/visimisi') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

    </div>
</div>

<?= $this->endSection() ?>
