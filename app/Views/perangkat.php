<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="perangkat">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">PERANGKAT DESA</h2>
      <p class="text-muted">
        Berikut adalah struktur dan jajaran perangkat desa yang berperan dalam menjalankan roda pemerintahan Desa Harapan Jaya.
      </p>
    </div>

    <div class="row g-4 justify-content-center">
      <?php if (!empty($perangkat)): ?>
        <?php foreach ($perangkat as $p): ?>
          <?php
          // Siapkan path foto (gunakan default jika kosong)
          $fileName = $p['foto'] ?? '';
          $imgSrc   = $fileName
            ? base_url('uploads/perangkat/' . $fileName)
            : base_url('uploads/perangkat/pejabat.jpeg'); // fallback default

          // ALT foto
          $altFoto  = !empty($p['alt_foto'])
            ? $p['alt_foto']
            : 'Foto ' . ($p['nama'] ?? 'Perangkat Desa');
          ?>
          <div class="col-md-4 col-sm-6 text-center">
            <div class="card border-0 shadow-sm p-3 h-100">
              <img
                src="<?= esc($imgSrc) ?>"
                alt="<?= esc($altFoto) ?>"
                class="rounded-circle mx-auto mb-3"
                style="width: 120px; height: 120px; object-fit: cover;" />
              <h5 class="fw-semibold mb-1"><?= esc($p['nama'] ?? '-') ?></h5>
              <p class="text-muted mb-0"><?= esc($p['jabatan'] ?? '-') ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <div class="alert alert-info text-center mb-0">
            Belum ada data perangkat.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>