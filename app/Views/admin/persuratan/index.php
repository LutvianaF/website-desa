<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h3 class="fw-bold">Manajemen Data Persuratan</h3>
        <a href="<?= base_url('admin/persuratan/create') ?>" class="btn btn-primary">+ Tambah Permohonan</a>
    </div>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
        <?php if (!empty($persuratan)): ?>
                <?php foreach ($persuratan as $i => $row): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['nik'] ?></td>
                        <td><?= $row['jenis_surat'] ?></td>
                        <td>
                            <span class="badge bg-info"><?= $row['status'] ?></span>
                        </td>
                        <td><?= $row['tanggal_pengajuan'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/persuratan/edit/'.$row['id_persuratan']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('admin/persuratan/delete/'.$row['id_persuratan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center text-muted">Belum ada data persuratan</td></tr>
        <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?= $this->endSection() ?>
