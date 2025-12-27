<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="struktur" class="py-4">
  <div class="container">
    <div class="text-center mb-4">
      <h3>STRUKTUR DESA</h3>
    </div>

    <?php if (!empty($struktur)): ?>
      <div class="row g-4">
        <?php foreach ($struktur as $i => $row): 
          // Siapkan variabel aman & fallback
          $nama         = esc($row['nama'] ?? 'Tanpa Nama');
          $jabatan      = esc($row['jabatan'] ?? '—');
          $nip          = esc($row['nip'] ?? '');
          $masa         = esc($row['masa_jabatan'] ?? '');
          $kontakRaw    = $row['kontak'] ?? '';
          $kontakHref   = !empty($row['link_kontak']) ? $row['link_kontak'] : ('tel:' . preg_replace('/\D+/', '', $kontakRaw));
          $kontakText   = esc($kontakRaw);
          $email        = esc($row['email'] ?? '');
          $emailHref    = !empty($row['link_email']) ? $row['link_email'] : (!empty($row['email']) ? 'mailto:' . $row['email'] : '#');
          $medsos       = esc($row['media_sosial'] ?? 'Media Sosial');
          $medsosHref   = !empty($row['link_medsos']) ? $row['link_medsos'] : '#';
          $slug         = esc($row['slug'] ?? '');
          $deskripsi    = nl2br(esc($row['deskripsi'] ?? ''));
          $img          = !empty($row['gambar']) ? base_url('uploads/struktur/' . $row['gambar']) : base_url('uploads/struktur/pejabat.jpeg');
          $alt          = esc($row['alt_gambar'] ?? $nama);
          $modalId      = 'modalPerangkat' . $i;
          $profilHref   = !empty($slug) ? base_url('struktur/' . $slug) : '#';
        ?>
          <div class="col-md-6">
            <article class="d-flex align-items-start gap-3" aria-labelledby="nama<?= $i ?>">
              <figure class="m-0">
                <img src="<?= $img ?>" alt="<?= $alt ?>" width="100" height="100"
                     style="object-fit:cover; border-radius:8px;" />
                <figcaption class="visually-hidden"><?= $jabatan ?></figcaption>
              </figure>

              <div class="flex-fill">
                <h5 id="nama<?= $i ?>" class="mb-1"><?= $nama ?></h5>
                <p class="text-muted mb-1"><?= $jabatan ?></p>

                <ul class="list-unstyled small text-secondary mb-2">
                  <?php if ($nip): ?><li><strong>NIP:</strong> <?= $nip ?></li><?php endif; ?>
                  <?php if ($masa): ?><li><strong>Masa Jabatan:</strong> <?= $masa ?></li><?php endif; ?>
                  <?php if ($kontakText): ?>
                    <li><strong>Kontak:</strong> <a href="<?= esc($kontakHref) ?>" class="text-decoration-none"><?= $kontakText ?></a></li>
                  <?php endif; ?>
                  <?php if ($email): ?>
                    <li><strong>Email:</strong> <a href="<?= esc($emailHref) ?>" class="text-decoration-none"><?= $email ?></a></li>
                  <?php endif; ?>
                </ul>

                <?php if ($deskripsi): ?>
                  <p class="mb-0 text-muted small"><?= $deskripsi ?></p>
                <?php endif; ?>

                <div class="mt-2 d-flex gap-2">
                  <?php if (!empty($slug)): ?>
                      <a href="<?= $profilHref = base_url('struktur/' . $slug); ?>" class="btn-bg btn-sm">Selengkapnya</a>
                  <?php endif; ?>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-info">Belum ada data struktur.</div>
    <?php endif; ?>
  </div>
</section>

<?= $this->endSection() ?>
