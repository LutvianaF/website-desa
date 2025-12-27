<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-2">
  <h3 class="fw-bold"> Manajemen Data Sarana & Prasarana</h3>
  <a href="<?= base_url('admin/sarpra/create') ?>" class="btn btn-primary">+ Tambah Data</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive shadow-sm bg-white p-3 rounded mb-5">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr class="text-center">
        <th>No</th>
        <th>Judul Sarana</th>
        <th>Deskripsi Sarana</th>
        <th>Judul Prasarana</th>
        <th>Deskrpsi Prasarana</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($sarpra)): ?>
        <?php foreach ($sarpra as $i => $row): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= esc($row['judul_sarana']) ?></td>
            <td><?= esc($row['isi_sarana']) ?></td>
            <td><?= esc($row['judul_prasarana']) ?></td>
            <td><?= esc($row['isi_prasarana']) ?></td>
            <td>
              <a href="<?= base_url('admin/sarpra/edit/' . $row['id_sarana']) ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="<?= base_url('admin/sarpra/delete/' . $row['id_sarana']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8" class="text-center">Belum ada data sarana prasarana.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- PETA PRASARANA  -->
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">Manajemen Data Peta Prasarana Desa</h4>
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahPrasarana">
    + Tambah Prasarana
  </button>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded mb-5">
  <table class="table table-bordered table-striped align-middle mb-0">
    <thead class="table-light">
      <tr class="text-center">
        <th style="width:60px">No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Koordinat</th>
        <th>Foto</th>
        <th style="width:180px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($prasarana)): ?>
        <?php $no = 1;
        foreach ($prasarana as $p): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= esc($p['nama_prasarana']) ?></td>
            <td><?= esc($p['deskripsi_prasarana']) ?></td>
            <td>
              <?= $p['lat_prasarana'] ?>,<br>
              <?= $p['long_prasarana'] ?>
            </td>
            <td class="text-center">
              <?php if ($p['foto_prasarana']): ?>
                <img src="<?= base_url('uploads/prasarana/' . $p['foto_prasarana']) ?>"
                  width="80" class="rounded">
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <button class="btn btn-warning btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#modalEdit<?= $p['id_prasarana'] ?>">
                Edit
              </button>

              <a href="<?= base_url('admin/sarpra/prasarana/delete/' . $p['id_prasarana']) ?>"
                onclick="return confirm('Hapus data ini?')"
                class="btn btn-danger btn-sm">
                Hapus
              </a>
            </td>
          </tr>

          <!-- MODAL EDIT -->
          <div class="modal fade" id="modalEdit<?= $p['id_prasarana'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?= base_url('admin/sarpra/prasarana/update/' . $p['id_prasarana']) ?>"
                  method="post" enctype="multipart/form-data">
                  <?= csrf_field() ?>
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Prasarana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                    <div class="mb-3">
                      <label>Nama Prasarana</label>
                      <input type="text" name="nama" class="form-control"
                        value="<?= esc($p['nama_prasarana']) ?>" required>
                    </div>

                    <div class="mb-3">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control"
                        rows="3"><?= esc($p['deskripsi_prasarana']) ?></textarea>
                    </div>

                    <div class="mb-3">
                      <label>Latitude</label>
                      <input type="text" name="lat" class="form-control"
                        value="<?= esc($p['lat_prasarana']) ?>" required>
                    </div>

                    <div class="mb-3">
                      <label>Longitude</label>
                      <input type="text" name="lng" class="form-control"
                        value="<?= esc($p['long_prasarana']) ?>" required>
                    </div>

                    <div class="mb-3">
                      <label>Foto (opsional)</label>
                      <input type="file" name="foto_prasarana" class="form-control">
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted">
            Belum ada data peta prasarana.
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambahPrasarana" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/sarpra/prasarana/store') ?>"
        method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="modal-header">
          <h5 class="modal-title">Tambah Peta Prasarana</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Prasarana</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="lat" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="lng" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto_prasarana" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- BAGIAN POLYGON -->
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">Manajemen Data Peta Tanah (Polygon)</h4>
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahTanah">
    + Tambah Peta Tanah
  </button>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded mb-5">
  <table class="table table-bordered table-striped align-middle mb-0">
    <thead class="table-light">
      <tr class="text-center">
        <th style="width:60px">No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Koordinat</th>
        <th>Foto</th>
        <th style="width:180px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($tanah)): ?>
        <?php $no = 1;
        foreach ($tanah as $t): ?>
          <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= esc($t['nama_tanah']) ?></td>
            <td><?= esc($t['deskripsi_tanah']) ?></td>
            <td><?= esc($t['koordinat']) ?></td>
            <td class="text-center">
              <?php if ($t['foto_tanah']): ?>
                <img src="<?= base_url('uploads/tanah/' . $t['foto_tanah']) ?>"
                  width="80" class="rounded">
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
            <td class="text-center">
              <button class="btn btn-warning btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#modalEditTanah<?= $t['id_tanah'] ?>">
                Edit
              </button>

              <a href="<?= base_url('admin/sarpra/tanah/delete/' . $t['id_tanah']) ?>"
                onclick="return confirm('Hapus titik tanah ini?')"
                class="btn btn-danger btn-sm">
                Hapus
              </a>
            </td>
          </tr>

          <!-- MODAL EDIT TANAH -->
          <div class="modal fade" id="modalEditTanah<?= $t['id_tanah'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?= base_url('admin/sarpra/tanah/update/' . $t['id_tanah']) ?>" method="post">
                  <?= csrf_field() ?>

                  <div class="modal-header">
                    <h5 class="modal-title">Edit Tanah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label>Nama Tanah</label>
                        <input type="text" name="nama" class="form-control"
                          value="<?= esc($t['nama_tanah']) ?>" required>
                      </div>

                      <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"
                          rows="3"><?= esc($t['deskripsi_tanah']) ?></textarea>
                      </div>

                      <div class="mb-3">
                        <label>Koordinat</label>
                        <input type="text" name="koordinat" class="form-control"
                          value="<?= esc($t['koordinat']) ?>" required>
                      </div>

                      <div class="mb-3">
                        <label>Foto (opsional)</label>
                        <input type="file" name="foto_tanah" class="form-control">
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button class="btn btn-primary">Update</button>
                    </div>

                </form>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="text-center text-muted">
            Belum ada data tanah (polygon).
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- MODAL TAMBAH TANAH -->
<div class="modal fade" id="modalTambahTanah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('admin/sarpra/tanah/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="modal-header">
          <h5 class="modal-title">Tambah Tanah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Tanah</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label>Koordinat</label>
            <input type="text" name="koordinat" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto_tanah" class="form-control">
          </div>
        </div>


        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>