<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="wilayah">
  <div class="container">
    <!-- Header -->
    <div class="text-center mb-4">
      <h3 class="mb-0 fw-bold">DATA WILAYAH</h3>
    </div>

    <!-- Deskripsi umum -->
    <p class="text-muted mb-4">
      Wilayah Desa Makmur Jaya terbagi menjadi beberapa dusun, RW, dan RT dengan karakteristik geografis yang beragam. 
      Setiap wilayah memiliki peran penting dalam penyelenggaraan pemerintahan desa serta pengelolaan potensi sumber daya alam dan masyarakatnya.
    </p>

    <!-- Statistik Wilayah -->
    <div class="row text-center mb-5">
      <?php 
        $total_rw = array_sum(array_column($wilayah, 'jumlah_rw'));
        $total_rt = array_sum(array_column($wilayah, 'jumlah_rt'));
      ?>
      <div class="col-md-4 col-6 mb-3">
        <div class="p-3 bg-white shadow-sm rounded">
          <h4 class="fw-bold mb-0"><?= count($wilayah) ?></h4>
          <p class="text-muted mb-0">Dusun</p>
        </div>
      </div>
      <div class="col-md-4 col-6 mb-3">
        <div class="p-3 bg-white shadow-sm rounded">
          <h4 class="fw-bold mb-0"><?= $total_rt ?></h4>
          <p class="text-muted mb-0">RT</p>
        </div>
      </div>
      <div class="col-md-4 col-6 mb-3">
        <div class="p-3 bg-white shadow-sm rounded">
          <h4 class="fw-bold mb-0"><?= $total_rw ?></h4>
          <p class="text-muted mb-0">RW</p>
        </div>
      </div>
    </div>

    <!-- Peta Wilayah -->
    <div class="card shadow-sm mb-5">
      <div class="card-header bg-primary text-white fw-bold">Peta Wilayah Desa</div>
      <div class="card-body text-center">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.168218877116!2d110.42364307462837!3d-8.189533982038153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a53bfb65a2ad5%3A0x7b2b41a2ecb928aa!2sBalai%20Desa!5e0!3m2!1sid!2sid!4v1696420000000!5m2!1sid!2sid"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
    </div>

    <!-- Tabel Data Wilayah -->
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white fw-bold">Rincian Data Wilayah per Dusun</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light text-center">
              <tr>
                <th>No</th>
                <th>Nama Wilayah</th>
                <th>RT</th>
                <th>RW</th>
                <th>Luas (Ha)</th>
                <th>Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($wilayah)): ?>
                <?php $no = 1; foreach ($wilayah as $w): ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= esc($w['nama_wilayah']) ?></td>
                    <td class="text-center"><?= esc($w['jumlah_rt']) ?></td>
                    <td class="text-center"><?= esc($w['jumlah_rw']) ?></td>
                    <td class="text-center"><?= esc($w['luas']) ?></td>
                    <td><?= esc($w['deskripsi']) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center text-muted">Belum ada data wilayah.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
