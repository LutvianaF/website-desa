<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="agenda">
  <div class="text-center mb-4">
    <h3 class="mb-0">AGENDA DESA</h3>
  </div>

  <div class="row g-4">
    <?php if (!empty($agenda)): ?>
      <?php foreach ($agenda as $item): ?>
        <div class="col-md-3 text-center">
          <div class="card border-0 shadow-sm h-100">
            <img
              src="<?= !empty($item['gambar'])
                      ? base_url('uploads/agenda/' . $item['gambar'])
                      : base_url('assets/img/no-image.png') ?>"
              alt="<?= esc($item['alt_gambar']) ?>"
              class="card-img-top"
              style="height: 180px; object-fit: cover" />
            <div class="card-body">
              <h5 class="card-title mb-2"><?= esc($item['judul']) ?></h5>
              <p class="text-muted small mb-1">
                📅 <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?>
                <?php if ($item['tanggal_selesai'] && $item['tanggal_selesai'] != $item['tanggal_mulai']): ?>
                  – <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                <?php endif; ?>
              </p>
              <p class="text-muted small mb-2">📍 <?= esc($item['nama_agenda']) ?></p>
              <a href="<?= site_url('agenda/' . $item['slug']) ?>" class="text-primary fw-semibold small">Lihat Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="text-center alert alert-info">
        <p>Belum ada agenda desa saat ini.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>