<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="sejarah">
  <div class="row g-4">
    <div class="col-md-4 text-center">
      <img
        src="<?= base_url('uploads/profil/' . $sejarah['gambar']); ?>"
        alt="<?= esc($sejarah['judul']); ?>"
        style="width: 300px; height: 300px; object-fit: cover; border-radius: 8px;"
      />
    </div>
    <div class="col-md-8">
      <h3><?= esc(strtoupper($sejarah['judul'])); ?></h3>
      <div class="card-text">
        <?= $sejarah['isi']; ?>
      </div>
      <small class="text-muted">Diperbarui: <?= date('d M Y', strtotime($sejarah['updated_at'])); ?></small>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
