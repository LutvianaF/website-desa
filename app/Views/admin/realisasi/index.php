<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-2">
  <h3 class="fw-bold">Realisasi Anggaran</h3>
  <a href="<?= base_url('admin/realisasi/create') ?>" class="btn btn-primary">+ Tambah Data</a>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr class="text-center">
        <th>Bidang</th>
        <th>Tahun</th>
        <th>Anggaran</th>
        <th>Realisasi</th>
        <th>Persentase</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
          <tr>
            <td><?= $row['bidang'] ?></td>
            <td><?= $row['tanggal_realisasi'] ?></td>
            <td>Rp<?= number_format($row['anggaran'], 0, ',', '.') ?></td>
            <td>Rp<?= number_format($row['realisasi'], 0, ',', '.') ?></td>
            <td>
              <?php
              $anggaran  = (float) $row['anggaran'];
              $realisasi = (float) $row['realisasi'];

              if ($anggaran > 0) {
                $persen = round(($realisasi / $anggaran) * 100, 2); // 2 angka di belakang koma
              } else {
                $persen = 0;
              }

              echo $persen . '%';
              ?>
            </td>

            <td>
              <a href="<?= base_url('admin/realisasi/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
              <a onclick="return confirm('Hapus data?')" href="<?= base_url('admin/realisasi/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center text-muted">Belum ada data realisasi anggaran</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>