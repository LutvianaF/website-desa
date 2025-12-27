<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-2">
  <h3 class="fw-bold">Manajemen Visi & Misi</h3>
  <a href="<?= base_url('admin/visimisi/create') ?>" class="btn btn-primary">+ Tambah Data</a>
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
            <th width="40">No</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Gambar</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php if ($visimisi): ?>
            <tr>
                <td>1</td>

                <td style="white-space:pre-line;">
                <?= esc($visimisi['visi']) ?>
                </td>

                <td style="white-space:pre-line;">
                <?= esc($visimisi['misi']) ?>
                </td>

                <td>
                <img src="<?= base_url('uploads/visimisi/' . ($visimisi['gambar'])) ?>"
                    width="60" height="60"
                    style="object-fit:cover; border-radius:6px;">
                </td>

                <td>
                <a href="<?= base_url('admin/visimisi/edit/' . $visimisi['id_visimisi']) ?>"
                    class="btn btn-warning btn-sm">Edit</a>

                <form action="<?= base_url('admin/visimisi/delete/' . $visimisi['id_visimisi']) ?>"
                        method="get"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
                </td>
            </tr>

            <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data Visi & Misi.</td>
            </tr>
            <?php endif; ?>

        </tbody>
    </table>
  </div>

<?= $this->endSection() ?>
