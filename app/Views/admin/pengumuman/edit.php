<?= $this->extend('admin/template/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Edit Pengumuman</h2>

    <form action="<?= base_url('admin/pengumuman/update/'.$pengumuman['id_pengumuman']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= esc($pengumuman['judul']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required><?= esc($pengumuman['deskripsi']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= esc($pengumuman['tanggal']) ?>">
        </div>

        <div class="mb-3">
            <label>Gambar</label><br>
            <?php if ($pengumuman['gambar']): ?>
                <img src="<?= base_url('uploads/pengumuman/'.$pengumuman['gambar']) ?>" width="100" class="mb-2">
            <?php endif; ?>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>
