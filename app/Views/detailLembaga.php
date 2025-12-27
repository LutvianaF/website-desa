<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="detail-lembaga" class="py-5">
  <div class="container">
    <div class="text-center mb-4">
      <img 
        src="<?= base_url('uploads/lembaga/' . esc($lembaga['gambar'])) ?>" 
        alt="<?= esc($lembaga['alt_gambar']) ?>" 
        class="rounded-circle shadow-sm mb-3" 
        style="width:120px;height:120px;object-fit:cover;"
      >
      <h3 class="fw-bold"><?= esc($lembaga['nama_lembaga']) ?></h3>
      <p class="text-muted"><?= esc($lembaga['jabatan']) ?>: <?= esc($lembaga['nama']) ?></p>
    </div>

    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <h5 class="fw-bold mb-3">Tentang Lembaga</h5>
        <p><?= nl2br(esc($lembaga['deskripsi'])) ?></p>

        <?php if (!empty($lembaga['kontak'])): ?>
          <div class="mt-4">
            <a href="<?= esc($lembaga['link_kontak']) ?>" target="_blank" class="btn btn-primary">
              Hubungi: <?= esc($lembaga['kontak']) ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="mt-4 text-center">
      <a href="<?= base_url('/lembaga') ?>" class="btn btn-outline-secondary">← Kembali ke Daftar Lembaga</a>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
