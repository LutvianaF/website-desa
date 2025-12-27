<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="realisasi">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">Realisasi Anggaran Desa</h2>
      <p class="text-muted">Transparansi penggunaan dana desa tahun 2025</p>
    </div>

    <div class="table-responsive mb-4">
      <table class="table table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Bidang</th>
            <th>Anggaran</th>
            <th>Realisasi</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($realisasi as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['bidang'] ?></td>
              <td>Rp<?= number_format($row['anggaran'], 0, ',', '.') ?></td>
              <td>Rp<?= number_format($row['realisasi'], 0, ',', '.') ?></td>
              <td><?= $row['deskripsi'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <canvas id="anggaranChart" height="120"></canvas>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?= json_encode(array_column($realisasi, 'bidang')); ?>;
    const anggaran = <?= json_encode(array_column($realisasi, 'anggaran')); ?>;
    const realisasi = <?= json_encode(array_column($realisasi, 'realisasi')); ?>;

    const ctx = document.getElementById('anggaranChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Anggaran',
                    data: anggaran,
                    borderWidth: 1
                },
                {
                    label: 'Realisasi',
                    data: realisasi,
                    borderWidth: 1
                }
            ]
        }
    });
</script>


<?= $this->endSection() ?>