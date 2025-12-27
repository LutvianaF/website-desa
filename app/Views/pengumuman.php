<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="pengumuman">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">PENGUMUMAN</h2>
      <p class="text-muted">
        Informasi penting dan pemberitahuan resmi dari Desa Harapan Jaya.
      </p>
    </div>

    <div class="row g-4">
      <?php if (!empty($pengumuman)): ?>
        <?php foreach ($pengumuman as $p): ?>
          <?php
            // path gambar: gunakan default jika kosong
            $imgPath = $p['gambar']
              ? base_url('uploads/pengumuman/' . $p['gambar'])
              : base_url('uploads/pengumuman/pengumuman-default.jpeg');

            $alt = $p['alt_gambar'] ?: 'Gambar Pengumuman';
            $tanggal = date('d F Y', strtotime($p['tanggal']));
          ?>
          <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
              <?php if (!empty($p['gambar'])): ?>
                <img
                  src="<?= esc($imgPath) ?>"
                  alt="<?= esc($alt) ?>"
                  class="card-img-top"
                  style="height: 220px; object-fit: cover;"
                />
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title mb-2">
                  <a href="<?= base_url('pengumuman/' . esc($p['slug'])) ?>" class="text-dark text-decoration-none">
                    <?= esc($p['judul']) ?>
                  </a>
                </h5>
                <p class="card-text text-muted mb-2">
                  <?= character_limiter(strip_tags($p['deskripsi']), 100) ?>...
                </p>
                <p class="text-secondary small mb-3">
                  <i class="bi bi-calendar-event"></i> <?= esc($tanggal) ?>
                </p>
                <a href="<?= base_url('pengumuman/' . esc($p['slug'])) ?>" class="text-primary fw-semibold">
                  Baca Selengkapnya
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <div class="alert alert-info">Belum ada pengumuman untuk ditampilkan.</div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>