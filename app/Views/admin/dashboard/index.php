<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

    <div class="container py-5">
    <h3 class="fw-bold mb-4">Dashboard</h3>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="dashboard-card">
          <div class="dashboard-title">Jumlah Agenda</div>
          <div class="dashboard-value"><?= esc($sliderCount ?? 0) ?></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-card">
          <div class="dashboard-title">Jumlah Pengumuman</div>
          <div class="dashboard-value"><?= esc($produkCount ?? 0) ?></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-card">
          <div class="dashboard-title">Jumlah Berita</div>
          <div class="dashboard-value"><?= esc($artikelCount ?? 0) ?></div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="dashboard-card">
          <div class="dashboard-title">Role Anda : Admin</div>
        </div>
      </div>
    </div>
  </div>

  <?= $this->endSection() ?>
