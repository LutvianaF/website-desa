<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3>Tambah Struktur Desa</h3>

<form action="<?= base_url('admin/struktur/store') ?>" method="post" enctype="multipart/form-data" class="mt-4">
  <div class="row">

    <div class="col-md-6 mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Jabatan</label>
      <input type="text" name="jabatan" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">NIP</label>
      <input type="text" name="nip" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Masa Jabatan</label>
      <input type="text" name="masa_jabatan" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Kontak</label>
      <input type="text" name="kontak" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Media Sosial</label>
      <input type="text" name="media_sosial" class="form-control" placeholder="Instagram, Facebook, dll">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Link Media Sosial</label>
      <input type="url" name="link_medsos" class="form-control">
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Slug Profil (opsional)</label>
      <input type="text" name="slug" class="form-control" placeholder="contoh: kepala-desa-john-doe">
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" rows="5" class="form-control"></textarea>
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Foto</label>
      <input type="file" name="gambar" class="form-control">
    </div>

  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('admin/struktur') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>