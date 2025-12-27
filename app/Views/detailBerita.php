<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<?php
// Fallback jika tidak ada gambar
$img = $berita['gambar']
    ? base_url('/' . $berita['gambar'])
    : base_url('assets/img/berita-default.jpg');

$tanggal = date('d F Y', strtotime($berita['tanggal']));
?>

<section id="berita-detail" class="py-5">
  <div class="container">
    <div class="mb-4 text-center">
      <h1 class="fw-bold mb-3"><?= esc($berita['judul']) ?></h1>
      <p class="text-muted">
        <i class="bi bi-calendar-event"></i> <?= esc($tanggal) ?>
      </p>
    </div>

    <div class="text-center mb-4">
      <img
        src="<?= esc($img) ?>"
        alt="<?= esc($berita['alt_gambar'] ?: 'Gambar Berita') ?>"
        class="img-fluid rounded shadow-sm"
        style="max-height: 400px; object-fit: cover;"
      />
    </div>

    <article class="berita-content mx-auto" style="max-width: 800px; text-align: justify;">
      <?= $berita['deskripsi'] ?>
    </article>

    <div class="text-center mt-5">
      <a href="<?= base_url('berita') ?>" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
      </a>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>
