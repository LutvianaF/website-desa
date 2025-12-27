<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h3 class="fw-bold">Manajemen Data Penduduk</h3>
    <a href="<?= base_url('admin/penduduk/create') ?>" class="btn btn-primary">+ Tambah Data</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr class="text-center">
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Dusun</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($penduduk)): ?>
        <?php $no=1; foreach ($penduduk as $p): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($p['nik']) ?></td>
            <td><?= esc($p['nama']) ?></td>
            <td><?= esc($p['jenis_kelamin']) ?></td>
            <td><?= esc($p['dusun']) ?></td>
            <td><?= esc($p['status_keluarga']) ?></td>
            <td>
                <a href="<?= base_url('admin/penduduk/edit/'.$p['id_penduduk']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a onclick="return confirm('Yakin hapus?')" 
                   href="<?= base_url('admin/penduduk/delete/'.$p['id_penduduk']) ?>" 
                   class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center text-muted">Belum ada data penduduk</td></tr>
        <?php endif; ?>
    </tbody>
    </table>
  </div>

<?= $this->endSection() ?>
