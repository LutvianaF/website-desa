<?= $this->extend('admin/template/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h3 class="fw-bold"> Manajemen Lembaga Desa</h3>
    <a href="<?= base_url('admin/lembaga/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Lembaga
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr class="text-center">
            <th style="width: 5%;">No</th>
            <th style="width: 10%;">Gambar</th>
            <th>Nama Lembaga</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th style="width: 20%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($lembaga)): ?>
            <?php $no = 1; foreach ($lembaga as $l): ?>
              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center">
                  <?php if (!empty($l['gambar'])): ?>
                    <img src="<?= base_url('uploads/lembaga/' . esc($l['gambar'])) ?>" 
                         alt="<?= esc($l['alt_gambar']) ?>" 
                         class="img-thumbnail"
                         style="width: 60px; height: 60px; object-fit: cover;">
                  <?php else: ?>
                    <span class="text-muted">-</span>
                  <?php endif; ?>
                </td>
                <td><?= esc($l['nama_lembaga']) ?></td>
                <td><?= esc($l['jabatan']) ?></td>
                <td><?= esc($l['nama']) ?></td>
                <td class="text-center">
                  <!-- <a href="<?= base_url('lembaga/' . esc($l['slug'])) ?>" target="_blank" class="btn btn-sm btn-info mb-1">
                    <i class="fas fa-eye"></i> Lihat Publik
                  </a> -->
                  <a href="<?= base_url('admin/lembaga/edit/' . $l['id_lembaga']) ?>" class="btn btn-sm btn-warning mb-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="<?= base_url('admin/lembaga/delete/' . $l['id_lembaga']) ?>" 
                     class="btn btn-sm btn-danger mb-1"
                     onclick="return confirm('Yakin ingin menghapus data ini?');">
                    <i class="fas fa-trash"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center text-muted">Belum ada data lembaga.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

<?= $this->endSection() ?>
