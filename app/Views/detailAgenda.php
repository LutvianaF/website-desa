<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-3"><?= esc($agenda['judul']) ?></h2>
    <p class="text-muted mb-2">📅 <?= date('d M Y', strtotime($agenda['tanggal_mulai'])) ?>
      <?php if ($agenda['tanggal_selesai']): ?> - <?= date('d M Y', strtotime($agenda['tanggal_selesai'])) ?><?php endif; ?>
    </p>
    <p class="text-muted mb-3">📍 <?= esc($agenda['nama_agenda']) ?></p>

    <img src="<?= base_url('uploads/agenda/' . $agenda['gambar']) ?>" alt="<?= esc($agenda['alt_gambar']) ?>" class="img-fluid mb-4 rounded shadow-sm">

    <div class="content">
      <?= esc($agenda['deskripsi']) ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>