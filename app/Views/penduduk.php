<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="penduduk">
  <div class="container">
    <h3 class="text-center fw-bold mb-4">JUMLAH PENDUDUK</h3>

    <p class="text-muted text-center mb-5">
      Data berikut merupakan hasil rekapitulasi penduduk Desa Sukamaju berdasarkan jenis kelamin dan dusun.
    </p>

    <div class="mb-5">
      <canvas id="myChartDetail"></canvas>
    </div>

    <!-- Statistik Umum -->
    <div class="row text-center mb-5">
      <div class="col-6 col-md-3 mb-3">
        <div class="p-3 bg-light rounded shadow-sm">
          <h4 class="fw-bold mb-0"><?= $summary['total'] ?? 0 ?></h4>
          <small>Total Penduduk</small>
        </div>
      </div>
      <div class="col-6 col-md-3 mb-3">
        <div class="p-3 bg-light rounded shadow-sm">
          <h4 class="fw-bold mb-0"><?= $summary['laki'] ?? 0 ?></h4>
          <small>Laki-Laki</small>
        </div>
      </div>
      <div class="col-6 col-md-3 mb-3">
        <div class="p-3 bg-light rounded shadow-sm">
          <h4 class="fw-bold mb-0"><?= $summary['perempuan'] ?? 0 ?></h4>
          <small>Perempuan</small>
        </div>
      </div>
      <div class="col-6 col-md-3 mb-3">
        <div class="p-3 bg-light rounded shadow-sm">
          <h4 class="fw-bold mb-0"><?= $summary['kk'] ?? 0 ?></h4>
          <small>Kepala Keluarga</small>
        </div>
      </div>
    </div>

    <!-- Tabel Data Penduduk -->
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white fw-bold">
        Rekap Penduduk per Dusun
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-striped mb-0 text-center">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama Dusun</th>
                <th>Laki-Laki</th>
                <th>Perempuan</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($rekapDusun)): ?>
                <?php $no = 1; foreach ($rekapDusun as $row): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['dusun']) ?></td>
                    <td><?= $row['laki'] ?></td>
                    <td><?= $row['perempuan'] ?></td>
                    <td><?= $row['total'] ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="5" class="text-muted">Belum ada data penduduk</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>