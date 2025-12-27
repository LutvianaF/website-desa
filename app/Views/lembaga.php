<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="lembaga">
  <h3 class="mb-4 text-center">LEMBAGA DESA</h3>
  <p class="text-center mb-5">
    Berikut adalah informasi lebih lengkap mengenai berbagai lembaga yang berperan dalam mendukung jalannya pemerintahan dan pembangunan di desa.
  </p>

  <div class="row g-4">
    <?php if (!empty($lembaga)): ?>
      <?php foreach ($lembaga as $l): ?>
        <div class="col-md-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <img 
                  src="<?= base_url('uploads/lembaga/' . esc($l['gambar'])) ?>" 
                  alt="<?= esc($l['alt_gambar']) ?>" 
                  class="rounded-circle me-3" 
                  style="width: 70px; height: 70px; object-fit: cover;"
                >
                <div>
                  <h5 class="mb-0">
                    <a href="<?= base_url('lembaga/' . esc($l['slug'])) ?>" class="text-decoration-none text-dark">
                      <?= esc($l['nama_lembaga']) ?>
                    </a>
                  </h5>
                  <p class="text-muted mb-0">
                    <?= esc($l['jabatan']) ?>: <?= esc($l['nama']) ?>
                  </p>
                </div>
              </div>
              <p><?= character_limiter(esc($l['deskripsi']), 150) ?></p>
              <a href="<?= base_url('lembaga/' . esc($l['slug'])) ?>" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-muted alert alert-info">Belum ada data lembaga yang tersedia.</p>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
