<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

  <div class="d-flex justify-content-between align-items-center mb-2">
    <h3 class="fw-bold">Daftar Pengumuman Desa</h3>
    <a href="<?= base_url('admin/pengumuman/create') ?>" class="btn btn-primary">+ Tambah Pengumuman</a>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr class="text-center">
          <th width="5%">No</th>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Tanggal</th>
          <th>Gambar</th>
          <th width="15%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($pengumuman)): ?>
          <?php $no = 1; foreach ($pengumuman as $p): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= esc($p['judul']) ?></td>
              <td><?= esc($p['deskripsi']) ?></td>
              <td><?= esc($p['tanggal']) ?></td>

              <td class="text-center">
                <?php if ($p['gambar']): ?>
                  <img src="<?= base_url('uploads/pengumuman/' . esc($p['gambar'])) ?>" 
                         class="img-thumbnail"
                         style="width: 60px; height: 60px; object-fit: cover;">                
                <?php else: ?>
                  <span class="text-muted">-</span>
                <?php endif; ?>
              </td>

              <td class="text-center">
                <a href="<?= base_url('admin/pengumuman/edit/'.$p['id_pengumuman']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('admin/pengumuman/delete/'.$p['id_pengumuman']) ?>" 
                   onclick="return confirm('Yakin ingin menghapus?')" 
                   class="btn btn-sm btn-danger">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="6" class="text-center text-muted">Belum ada data pengumuman</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

<?= $this->endSection() ?>
