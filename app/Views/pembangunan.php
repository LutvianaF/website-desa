<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="pembangunan" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">PEMBANGUNAN DESA</h2>
      <p class="text-muted">
        Informasi kegiatan pembangunan fisik dan non-fisik di Desa Harapan Jaya.
      </p>
    </div>

    <div class="row g-4">
      <?php if (!empty($pembangunan)): ?>
        <?php foreach ($pembangunan as $p): ?>
          <?php
            // path gambar: default jika kosong
            $imgPath = !empty($p['foto'])
              ? base_url('uploads/pembangunan/' . $p['foto'])
              : base_url('assets/img/artikel.jpeg');

            $alt       = $p['alt_foto'] ?: 'Foto Pembangunan Desa';
            $progres   = (int) ($p['progres'] ?? 0);
            $anggaran  = (float) ($p['anggaran'] ?? 0);
          ?>
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
              <img
                src="<?= esc($imgPath) ?>"
                alt="<?= esc($alt) ?>"
                class="card-img-top"
                style="height: 220px; object-fit: cover;"
              />

              <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-2">
                  <a href="<?= base_url('pembangunan/' . esc($p['slug'])) ?>"
                     class="text-dark text-decoration-none">
                    <?= esc($p['nama_pembangunan']) ?>
                  </a>
                </h5>

                <p class="text-muted small mb-2">
                  <i class="bi bi-geo-alt"></i>
                  <?= esc($p['lokasi']) ?>
                </p>

                <?php if ($anggaran > 0): ?>
                  <p class="mb-2">
                    <i class="bi bi-cash-stack"></i>
                    Rp<?= number_format($anggaran, 0, ',', '.') ?>
                  </p>
                <?php endif; ?>

                <?php if ($progres >= 0): ?>
                  <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                      <span>Progres</span>
                      <span><?= $progres ?>%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                      <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: <?= $progres ?>%;"
                        aria-valuenow="<?= $progres ?>"
                        aria-valuemin="0"
                        aria-valuemax="100">
                      </div>
                    </div>
                  </div>
                <?php endif; ?>

                <p class="card-text text-muted mb-3">
                  <?= character_limiter(strip_tags($p['deskripsi']), 100) ?>...
                </p>

                <div class="mt-auto">
                  <a href="<?= base_url('pembangunan/' . esc($p['slug'])) ?>"
                     class="text-primary fw-semibold">
                    Lihat Detail
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center">
          <div class="alert alert-info">
            Belum ada data pembangunan untuk ditampilkan.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
