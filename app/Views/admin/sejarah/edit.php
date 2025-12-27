<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h2>Edit Sejarah Desa</h2>

<form action="<?= base_url('admin/sejarah/update/'.$sejarah['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= esc($sejarah['judul']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="gambar">Upload Gambar</label>
        <input type="file" name="gambar" id="gambar" class="form-control">

        <!-- Preview gambar lama -->
        <?php if (!empty($sejarah['gambar'])): ?>
            <p class="mt-2">Gambar saat ini:</p>
            <img src="<?= base_url($sejarah['gambar']) ?>" 
                alt="gambar" 
                style="width:150px; height:150px; object-fit:cover;">
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="isi" class="form-control" rows="6"><?= esc($sejarah['isi']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/sejarah') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
