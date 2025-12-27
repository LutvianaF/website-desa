<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-2">
  <h3 class="fw-bold">Manajemen Data Wilayah</h3>
  <a href="/admin/wilayah/create" class="btn btn-primary">+ Tambah Data</a>
</div>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr class="text-center">
          <th>No</th>
          <th>Nama Wilayah</th>
          <th>RT</th>
          <th>RW</th>
          <th>Luas</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($wilayah)): ?>
        <?php $no=1; foreach($wilayah as $w): ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td><?= esc($w['nama_wilayah']) ?></td>
          <td class="text-center"><?= esc($w['jumlah_rt']) ?></td>
          <td class="text-center"><?= esc($w['jumlah_rw']) ?></td>
          <td class="text-center"><?= esc($w['luas']) ?></td>
          <td><?= esc($w['deskripsi']) ?></td>
          <td class="text-center">
            <a href="/admin/wilayah/edit/<?= $w['id_wilayah'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="/admin/wilayah/delete/<?= $w['id_wilayah'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="8" class="text-center">Belum ada data wilayah.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>

<?= $this->endSection() ?>
