<?= $this->extend('layouts/template'); ?>  
<?= $this->section('content'); ?>     

<?php
$nama       = esc($struktur['nama'] ?? '');
$jabatan    = esc($struktur['jabatan'] ?? '');
$nip        = esc($struktur['nip'] ?? '');
$masa       = esc($struktur['masa_jabatan'] ?? '');
$kontak     = esc($struktur['kontak'] ?? '');
$email      = esc($struktur['email'] ?? '');
$medsos     = esc($struktur['media_sosial'] ?? '');
$deskripsi  = nl2br(esc($struktur['deskripsi'] ?? ''));
$img        = !empty($struktur['gambar']) ? base_url('uploads/struktur/' . $struktur['gambar']) : base_url('uploads/struktur/pejabat.jpeg');
?>

<section class="py-5">
  <div class="container">
      <div class="row g-4 align-items-start">
          <div class="col-md-4 text-center">
        <img src="<?= $img ?>" alt="<?= $nama ?>"
             class="img-fluid rounded shadow"
             style="object-fit: cover; width: 100%; max-width: 280px; height: 280px;">
        <h3 class="mt-3"><?= $nama ?></h3>
        <p class="text-muted"><?= $jabatan ?></p>
      </div>

      <div class="col-md-6">
        <ul class="list-unstyled">
          <?php if ($nip): ?><li><strong>NIP:</strong> <?= $nip ?></li><?php endif; ?>
          <?php if ($masa): ?><li><strong>Masa Jabatan:</strong> <?= $masa ?></li><?php endif; ?>
          <?php if ($kontak): ?><li><strong>Kontak:</strong> <?= $kontak ?></li><?php endif; ?>
            <?php if ($email): ?><li><strong>Email:</strong> <?= $email ?></li><?php endif; ?>
                <?php if ($medsos): ?><li><strong>Media Sosial:</strong> <?= $medsos ?></li><?php endif; ?>
                </ul>
                
                <hr>
                
                <h5>Deskripsi</h5>
                <?php if (!empty($deskripsi)): ?>
                    <p><?= $deskripsi ?></p>
                    <?php else: ?>
                        <p class="text-muted">Belum ada deskripsi tersedia.</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <a href="<?= base_url('struktur'); ?>" class="btn-bg">← Kembali</a>
                    </div>
                </div>
            </div>
</section>

<?= $this->endSection(); ?>  
