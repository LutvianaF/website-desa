<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3>Edit Struktur Desa</h3>

<form action="<?= base_url('admin/struktur/update/' . $struktur['id']) ?>" method="post" enctype="multipart/form-data" class="mt-4">
  <div class="row">

    <div class="col-md-6 mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= esc($struktur['nama']) ?>" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Jabatan</label>
      <input type="text" name="jabatan" class="form-control" value="<?= esc($struktur['jabatan']) ?>" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">NIP</label>
      <input type="text" name="nip" class="form-control" value="<?= esc($struktur['nip']) ?>">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Masa Jabatan</label>
      <input type="text" name="masa_jabatan" class="form-control" value="<?= esc($struktur['masa_jabatan']) ?>">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Kontak</label>
      <input type="text" name="kontak" class="form-control" value="<?= esc($struktur['kontak']) ?>">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= esc($struktur['email']) ?>">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Media Sosial</label>
      <input type="text" name="media_sosial" class="form-control" value="<?= esc($struktur['media_sosial']) ?>">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Link Media Sosial</label>
      <input type="url" name="link_medsos" class="form-control" value="<?= esc($struktur['link_medsos']) ?>">
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Slug Profil (opsional)</label>
      <input type="text" name="slug" class="form-control" value="<?= esc($struktur['slug']) ?>">
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" rows="5" class="form-control"><?= esc($struktur['deskripsi']) ?></textarea>
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Foto Saat Ini</label><br>
      <img src="<?= base_url('assets/img/' . ($struktur['gambar'] ?? 'pejabat.jpeg')) ?>" width="100" height="100" style="object-fit:cover; border-radius:6px;">
    </div>

    <div class="col-md-12 mb-3">
      <label class="form-label">Ganti Foto (opsional)</label>
      <input type="file" name="gambar" class="form-control">
    </div>

  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="<?= base_url('admin/struktur') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>