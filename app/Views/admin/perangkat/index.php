<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h3 class="fw-bold">Data Perangkat Desa</h3>
    <a href="<?= base_url('admin/perangkat/create') ?>" class="btn btn-primary">+ Tambah Data</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr class="text-center">
          <th>No</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($perangkat as $p): ?>
          <tr>
            <td><?= $p['id_perangkat'] ?></td>
            <td>
              <img src="<?= base_url('uploads/perangkat/' . ($p['foto'] ?? 'pejabat.jpeg')) ?>"
                  width="60" class="rounded">
            </td>
            <td><?= esc($p['nama']) ?></td>
            <td><?= esc($p['jabatan']) ?></td>
            <td>
              <a class="btn btn-sm btn-warning" href="<?= base_url('admin/perangkat/edit/'.$p['id_perangkat']) ?>">Edit</a>
              <a class="btn btn-sm btn-danger" href="<?= base_url('admin/perangkat/delete/'.$p['id_perangkat']) ?>"
                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<?= $this->endSection() ?>
