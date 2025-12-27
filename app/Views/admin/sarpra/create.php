<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Tambah Sarana & Prasarana</h3>

<form action="<?= base_url('admin/sarpra/store') ?>" method="post">

  <div class="mb-3">
    <label>Judul Sarana</label>
    <input type="text" name="judul_sarana" class="form-control">
  </div>

  <div class="mb-3">
    <label>Isi Sarana (dipisah koma)</label>
    <textarea name="isi_sarana" class="form-control"></textarea>
  </div>

  <div class="mb-3">
    <label>Judul Prasarana</label>
    <input type="text" name="judul_prasarana" class="form-control">
  </div>

  <div class="mb-3">
    <label>Isi Prasarana (dipisah koma)</label>
    <textarea name="isi_prasarana" class="form-control"></textarea>
  </div>

  <button class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('admin/sarpra') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
