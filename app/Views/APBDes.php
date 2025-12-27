<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="apbdes" class="mt-5">
  <h3 class="mb-4 text-center">ANGGARAN PENDAPATAN DAN BELANJA DESA (APBDes)</h3>
  <p class="text-center mb-5">
    Berikut adalah rincian pendapatan, belanja, dan pembiayaan desa tahun anggaran berjalan yang digunakan untuk mendukung pembangunan dan pemberdayaan masyarakat desa.
  </p>

  <!-- RINCIAN PENDAPATAN -->
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
      <h5 class="mb-3 text-success">Rincian Pendapatan Desa</h5>

      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-light">
            <tr>
              <th>Kategori</th>
              <th>Jumlah (Rp)</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($pendapatan)): ?>
              <?php foreach ($pendapatan as $row): ?>
                <tr>
                  <td><?= esc($row['kategori']) ?></td>
                  <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                  <td><?= esc($row['keterangan']) ?></td>
                </tr>
              <?php endforeach; ?>

              <!-- BARIS TOTAL -->
              <tr class="fw-bold table-success">
                <td>Total Pendapatan</td>
                <td>Rp<?= number_format($totalPendapatan, 0, ',', '.') ?></td>
                <td></td>
              </tr>

            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">Belum ada data pendapatan desa.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>


  <!-- RINCIAN BELANJA -->
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
      <h5 class="mb-3 text-primary">Rincian Belanja Desa</h5>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-light">
            <tr>
              <th>Bidang</th>
              <th>Anggaran</th>
              <th>Realisasi</th>
              <th>Persentase</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($realisasi)): ?>
              <?php foreach ($realisasi as $row): ?>
                <tr>
                  <td><?= esc($row['bidang']) ?></td>
                  <td>Rp<?= number_format((float)$row['anggaran'], 0, ',', '.') ?></td>
                  <td>Rp<?= number_format((float)$row['realisasi'], 0, ',', '.') ?></td>
                  <td><?= $totalPersentase ?>%</td>
                </tr>
              <?php endforeach; ?>

              <!-- 🔽 Baris TOTAL -->
              <tr class="fw-bold table-primary">
                <td class="text-start">Total</td>
                <td>Rp<?= number_format($totalAnggaran, 0, ',', '.') ?></td>
                <td>Rp<?= number_format($totalRealisasi, 0, ',', '.') ?></td>
                <td><?= $totalPersentase ?>%</td>
              </tr>

            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center">Belum ada data realisasi anggaran.</td>
              </tr>
            <?php endif; ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

  <!-- RINCIAN PEMBIAYAAN -->
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
      <h5 class="mb-3 text-warning">Rincian Pembiayaan Desa</h5>

      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-light">
            <tr>
              <th>Uraian</th>
              <th>Jumlah (Rp)</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($pembiayaan)): ?>
              <?php foreach ($pembiayaan as $row): ?>
                <tr>
                  <td><?= esc($row['uraian']) ?></td>
                  <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                  <td><?= esc($row['keterangan']) ?></td>
                </tr>
              <?php endforeach; ?>

              <!-- TOTAL PEMBIAYAAN NETTO -->
              <tr class="fw-bold table-warning">
                <td>Total Pembiayaan Netto</td>
                <td>Rp<?= number_format($totalPembiayaanNetto, 0, ',', '.') ?></td>
                <td></td>
              </tr>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">Belum ada data pembiayaan desa.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>


  <!-- RINGKASAN APBDES (DINAMIS DARI DB) -->
  <div class="card border-0 shadow-sm">
    <div class="card-body text-center">
      <h5 class="mb-3 text-dark">Ringkasan Akhir APBDes</h5>

      <?php if (!empty($apbdes)) : ?>
        <p class="mb-1">
          <strong>Total Pendapatan:</strong>
          Rp <?= number_format($apbdes['total_pendapatan'], 0, ',', '.'); ?>
        </p>
        <p class="mb-1">
          <strong>Total Rencana Belanja:</strong>
          Rp <?= number_format($apbdes['total_rencana_belanja'], 0, ',', '.'); ?>
        </p>
        <p class="mb-1">
          <strong>Total Belanja:</strong>
          Rp <?= number_format($apbdes['total_belanja'], 0, ',', '.'); ?>
        </p>
        <p class="mb-1">
          <strong>Pembiayaan Netto:</strong>
          Rp <?= number_format($apbdes['total_pembiayaan'], 0, ',', '.'); ?>
        </p>
        <p class="fw-bold text-success mt-3">
          Sisa Lebih Anggaran (SiLPA):
          Rp <?= number_format($apbdes['silpa'], 0, ',', '.'); ?>
        </p>
      <?php else : ?>
        <p class="text-muted">Data APBDes belum tersedia.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->endSection() ?>