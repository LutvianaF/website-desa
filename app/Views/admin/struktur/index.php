<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
  <h3 class="fw-bold">Manajemen Struktur Desa</h3>
  <a href="<?= base_url('admin/struktur/create') ?>" class="btn btn-primary">+ Tambah Struktur</a>
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
          <th width="60">Foto</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>NIP</th>
          <th>Masa Jabatan</th>
          <th>Kontak</th>
          <th>Email</th>
          <th width="160">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($struktur)): ?>
          <?php foreach ($struktur as $row): ?>
            <tr>
              <td>
                <img src="<?= base_url('assets/img/' . ($row['gambar'] ?? 'pejabat.jpeg')) ?>" 
                    width="50" height="50" style="object-fit:cover; border-radius:6px;">
              </td>
              <td><?= esc($row['nama']) ?></td>
              <td><?= esc($row['jabatan']) ?></td>
              <td><?= esc($row['nip']) ?></td>
              <td><?= esc($row['masa_jabatan']) ?></td>
              <td><?= esc($row['kontak']) ?></td>
              <td><?= esc($row['email']) ?></td>
              <td>
                <a href="<?= base_url('admin/struktur/edit/' . $row['id_struktur']) ?>" class="btn btn-warning btn-sm">Edit</a>

                <form action="<?= base_url('admin/struktur/delete/' . $row['id_struktur']) ?>" method="post" 
                      class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="8" class="text-center">Belum ada data struktur.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

<?= $this->endSection() ?>
