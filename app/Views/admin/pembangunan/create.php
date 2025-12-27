<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<form action="<?= base_url('admin/pembangunan/store') ?>" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-8">
        <label>Nama Pembangunan</label>
        <input type="text" name="nama_pembangunan" class="form-control" required>

        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" required>

        <label>Anggaran</label>
        <input type="number" name="anggaran" class="form-control">

        <label>Progres (%)</label>
        <input type="number" name="progres" class="form-control">

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>

        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control">

        <label>Meta Description</label>
        <textarea name="meta_desc" class="form-control" rows="3"></textarea>
    </div>

    <div class="col-md-4">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">

        <label>Alt Foto</label>
        <input type="text" name="alt_foto" class="form-control">

        <button class="btn btn-primary mt-3 w-100">Simpan</button>
        <a href="<?= base_url('admin/pembangunan') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</form>

<?= $this->endSection() ?>