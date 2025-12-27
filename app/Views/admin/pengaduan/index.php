<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="fw-bold">Manajemen Pengaduan Masyarakat</h3>

  <!-- Tombol Tambah Kategori -->
  
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Kategori</th>
        <th>Pengaduan</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($pengaduan)): ?>
        <?php $no = 1;
        foreach ($pengaduan as $row): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= esc($row['nama']) ?></td>
            <td><?= esc($row['link_email']) ?></td>
            <td><?= esc($row['nama_kategori'] ?? '-') ?></td>
            <td><?= esc(character_limiter($row['pengaduan'], 80)) ?></td>
            <td class="text-center"><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center text-muted">Belum ada data pengaduan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- ============================ -->
<!-- DAFTAR KATEGORI PENGADUAN -->
<!-- ============================ -->

<div class="mt-5 d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-3">Kategori Pengaduan</h4>
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
    + Tambah Kategori
  </button>
</div>

  <div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-light">
        <tr class="text-center">
          <th style="width: 60px;">No</th>
          <th>Nama Kategori</th>
          <th style="width: 150px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($kategori)): ?>
          <?php $no = 1;
          foreach ($kategori as $kat): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= esc($kat['nama_kategori']) ?></td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#modalEditKategori<?= $kat['id_kategori_pengaduan'] ?>">
                  Edit
                </button>

                <a href="<?= base_url('admin/pengaduan/kategori/delete/' . $kat['id_kategori_pengaduan']) ?>"
                  onclick="return confirm('Hapus kategori ini?')"
                  class="btn btn-danger btn-sm">
                  Hapus
                </a>
              </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEditKategori<?= $kat['id_kategori_pengaduan'] ?>" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form action="<?= base_url('admin/pengaduan/kategori/update/' . $kat['id_kategori_pengaduan']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="modal-header">
                      <h5 class="modal-title">Edit Kategori</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori"
                          value="<?= esc($kat['nama_kategori']) ?>"
                          class="form-control" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>

          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center text-muted">Belum ada kategori.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>


<!-- ============================ -->
<!-- Modal Tambah Kategori -->
<!-- ============================ -->
<div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="<?= base_url('admin/pengaduan/kategori/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori Pengaduan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

<?= $this->endSection() ?>