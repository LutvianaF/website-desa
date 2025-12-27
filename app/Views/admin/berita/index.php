<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
  <h3 class="fw-bold">Manajemen Berita</h3>
  <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-primary">+ Tambah Berita</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php elseif (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>


<div class="table-responsive shadow-sm bg-white p-3 rounded">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr class="text-center">
        <th>No</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($berita as $i => $b): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= esc($b['judul']) ?></td>
          <td><?= $b['deskripsi'] ?></td>
          <td><?= $b['tanggal'] ?></td>
          <td>
            <?php if (!empty($b['gambar'])): ?>
              <img src="<?= base_url('/' . ($b['gambar'])) ?>"
                class="img-thumbnail"
                style="width: 60px; height: 60px; object-fit: cover;">
            <?php else: ?>
              <span class="text-muted">-</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="<?= base_url('admin/berita/edit/' . $b['id_berita']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('admin/berita/delete/' . $b['id_berita']) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>