<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="detail-pengumuman" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <article class="card shadow-sm border-0 p-4">
          <?php if (!empty($pengumuman['gambar'])): ?>
            <img
              src="<?= base_url('uploads/pengumuman/' . esc($pengumuman['gambar'])) ?>"
              alt="<?= esc($pengumuman['alt_gambar'] ?: 'Gambar Pengumuman') ?>"
              class="img-fluid rounded mb-4"
            />
          <?php endif; ?>

          <h2 class="fw-bold mb-3"><?= esc($pengumuman['judul']) ?></h2>

          <p class="text-muted mb-4">
            <i class="bi bi-calendar-event"></i>
            <?= date('d F Y', strtotime($pengumuman['tanggal'])) ?>
          </p>

          <div class="content mb-4">
            <?= $pengumuman['deskripsi'] ?>
          </div>

          <a href="<?= base_url('pengumuman') ?>" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengumuman
          </a>
        </article>

      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>