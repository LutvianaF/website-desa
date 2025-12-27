<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
  <h3 class="fw-bold">Manajemen Kritik Masyarakat</h3>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Kritik/Saran</th>
        <th>Tanggal</th>
        <!-- <th>Aksi</th> -->
      </tr>
    </thead>

    <tbody>
      <?php if (!empty($kritik)): ?>
        <?php $no = 1; ?>
        <?php foreach ($kritik as $row): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['link_email']) ?></td>
            <td><?= esc($row['kritikan']) ?></td>
            <td class="text-center">
              <?php if (!empty($row['created_at'])): ?>
                <?= date('d-m-Y H:i', strtotime($row['created_at'])) ?>
              <?php else: ?>
                -
              <?php endif; ?>
            </td>
            <!-- <td class="text-center">
              -
            </td> -->
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted">Belum ada data kritik.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>
