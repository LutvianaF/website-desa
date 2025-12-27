<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="berita">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">BERITA TERKINI</h2>
      <p class="text-muted">
        Kabar dan informasi terbaru seputar kegiatan serta pembangunan Desa Harapan Jaya.
      </p>
    </div>

    <div class="row g-4">
      <?php if (!empty($berita)): ?>
        <?php foreach ($berita as $b): ?>
          <?php
            $imgPath = $b['gambar']
              ? base_url('/' . $b['gambar'])
              : base_url('assets/img/berita-default.jpeg'); // fallback default

            $alt = $b['alt_gambar'] ?: 'Gambar Berita';
            $tanggal = date('d F Y', strtotime($b['tanggal']));
          ?>
          <div class="col-md-6">
            <div class="d-flex align-items-center shadow-sm p-3 rounded bg-light h-100">
              <img
                src="<?= esc($imgPath) ?>"
                alt="<?= esc($alt) ?>"
                class="rounded"
                style="width: 120px; height: 120px; object-fit: cover;"
              />
              <div class="ms-3">
                <h5 class="fw-semibold mb-1">
                  <a href="<?= base_url('berita/' . esc($b['slug'])) ?>" class="text-dark text-decoration-none">
                    <?= esc($b['judul']) ?>
                  </a>
                </h5>
                <p class="text-muted small mb-1">
                  <?= character_limiter(strip_tags($b['deskripsi']), 100) ?>...
                </p>
                <p class="text-muted mb-0"><i class="bi bi-calendar-event"></i> <?= esc($tanggal) ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <div class="alert alert-info">Belum ada berita untuk ditampilkan.</div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>