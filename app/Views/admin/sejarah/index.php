<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-2">
  <h3 class="fw-bold">Manajemen Sejarah Desa</h3>
  <a href="<?= base_url('admin/sejarah/create') ?>" class="btn btn-primary">+ Tambah Sejarah</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr class="text-center">
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($sejarah as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($row['judul']) ?></td>
                <td><img src="<?= base_url('assets/img/' . $row['gambar']) ?>" width="100"></td>
                <td><?= word_limiter(strip_tags($row['isi']), 20) ?></td>
                <td>
                    <a href="<?= base_url('admin/sejarah/edit/'.$row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('admin/sejarah/delete/'.$row['id']) ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
