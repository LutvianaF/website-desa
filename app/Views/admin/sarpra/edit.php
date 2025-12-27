<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Edit Sarana & Prasarana</h3>

<form action="<?= base_url('admin/sarpra/update/'.$data['id_sarana']) ?>" method="post">

  <div class="mb-3">
    <label>Judul Sarana</label>
    <input type="text" name="judul_sarana" class="form-control" value="<?= esc($data['judul_sarana']) ?>">
  </div>

  <div class="mb-3">
    <label>Isi Sarana (dipisah koma)</label>
    <textarea name="isi_sarana" class="form-control"><?= esc($data['isi_sarana']) ?></textarea>
  </div>

  <div class="mb-3">
    <label>Judul Prasarana</label>
    <input type="text" name="judul_prasarana" class="form-control" value="<?= esc($data['judul_prasarana']) ?>">
  </div>

  <div class="mb-3">
    <label>Isi Prasarana (dipisah koma)</label>
    <textarea name="isi_prasarana" class="form-control"><?= esc($data['isi_prasarana']) ?></textarea>
  </div>

  <button class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/sarpra') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
