<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<section id="vm">
  <h2 class="mb-4 text-center">VISI & MISI</h2>
  <div class="row g-4">
    <div class="col-md-4 text-center">
      <h3 class="card-title">VISI</h3>
      <p class="card-text">
        <?= esc($vimi['visi'] ?? 'Belum ada visi yang ditetapkan.'); ?>
      </p>
    </div>
    <div class="col-md-4 text-center">
      <?php if (!empty($vimi['gambar'])) : ?>
        <img
          src="<?= base_url('uploads/visimisi/' . $vimi['gambar']); ?>"
          alt="<?= esc($vimi['alt_gambar'] ?? 'visimisi'); ?>"
          class="img-fluid shadow rounded"
          style="width: 300px; height: 300px; object-fit: cover;" />
      <?php endif; ?>
    </div>
    <div class="col-md-4 text-center">
      <h3 class="card-title">MISI</h3>
      <p class="card-text">
        <?= $vimi['misi'] ?? 'Belum ada misi yang ditetapkan.'; ?>
      </p>
    </div>
  </div>
</section>

<?= $this->endSection() ?>