<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between mb-3">
    <h3 class="fw-bold">Data APBDes</h3>
    <a href="<?= base_url('admin/apbdes/create') ?>" class="btn btn-primary">+ Tambah Data APBDes</a>
</div>


<!-- ========================= -->
<!--    TABEL APBDES UTAMA     -->
<!-- ========================= -->

<div class="table-responsive shadow-sm bg-white p-3 rounded mb-5">
    <h5 class="fw-bold mb-3">Ringkasan APBDes</h5>

    <table class="table table-bordered table-striped align-middle mb-0">
        <thead class="table-light">
            <tr class="text-center">
                <th>Tahun</th>
                <th>Total Pendapatan</th>
                <th>Rencara Belanja</th>
                <th>Total Belanja</th>
                <th>Total Pembiayaan</th>
                <th>SILPA</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($apbdes)): ?>
                <?php foreach ($apbdes as $row): ?>
                    <tr>
                        <td class="text-center"><?= esc($row['tahun']) ?></td>
                        <td>Rp<?= number_format($row['total_pendapatan'], 0, ',', '.') ?></td>
                        <td>Rp<?= number_format($row['total_rencana_belanja'], 0, ',', '.') ?></td>
                        <td>Rp<?= number_format($row['total_belanja'], 0, ',', '.') ?></td>
                        <td>Rp<?= number_format($row['total_pembiayaan'], 0, ',', '.') ?></td>
                        <td>Rp<?= number_format($row['silpa'], 0, ',', '.') ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/apbdes/perbarui/' . $row['id_apbdes']) ?>" class="btn btn-warning btn-sm">
                                Perbarui
                            </a>
                            <a href="<?= base_url('admin/apbdes/delete/' . $row['id_apbdes']) ?>"
                                onclick="return confirm('Hapus data APBDes ini?')"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data APBDes.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- ========================= -->
<!--     PENDAPATAN DESA       -->
<!-- ========================= -->

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">Pendapatan Desa</h4>
    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahPendapatan">
        + Tambah Pendapatan
    </button>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded mb-5">
    <table class="table table-bordered table-striped align-middle mb-0">
        <thead class="table-light">
            <tr class="text-center">
                <th style="width: 60px;">No</th>
                <th>Kategori</th>
                <th>Jumlah (Rp)</th>
                <th>Tahun</th>
                <th>Keterangan</th>
                <th style="width: 80px;">Urutan</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pendapatan)): ?>
                <?php $no = 1; ?>
                <?php foreach ($pendapatan as $row): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= esc($row['kategori']) ?></td>
                        <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                        <td><?= esc($row['tanggal_pendapatan']) ?></td>
                        <td><?= esc($row['keterangan']) ?></td>
                        <td class="text-center"><?= esc($row['urutan']) ?></td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditPendapatan<?= $row['id_pendapatan'] ?>">
                                Edit
                            </button>

                            <!-- Tombol Delete -->
                            <a href="<?= base_url('admin/apbdes/pendapatan/delete/' . $row['id_pendapatan']) ?>"
                                onclick="return confirm('Hapus pendapatan ini?')"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>

                    <!-- Modal Edit Pendapatan -->
                    <div class="modal fade" id="modalEditPendapatan<?= $row['id_pendapatan'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= base_url('admin/apbdes/pendapatan/update/' . $row['id_pendapatan']) ?>" method="post">
                                    <?= csrf_field() ?>

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pendapatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Kategori</label>
                                            <input type="text" name="kategori" class="form-control"
                                                value="<?= esc($row['kategori']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jumlah (Rp)</label>
                                            <input type="number" name="jumlah" class="form-control"
                                                value="<?= esc($row['jumlah']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Pendapatan</label>
                                            <input type="date" name="tanggal_pendapatan" class="form-control"
                                                value="<?= esc($row['tanggal_pendapatan']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="3"><?= esc($row['keterangan']) ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Urutan</label>
                                            <input type="number" name="urutan" class="form-control"
                                                value="<?= esc($row['urutan']) ?>" required>
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
                    <td colspan="7" class="text-center text-muted">Belum ada data Pendapatan Desa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Pendapatan -->
<div class="modal fade" id="modalTambahPendapatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/apbdes/pendapatan/store') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_apbdes" value="<?= esc($id_apbdes) ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pendapatan Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pendapatan</label>
                        <input type="date" name="tanggal_pendapatan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="urutan" class="form-control" value="0" required>
                        <small class="text-muted">Dipakai untuk mengatur urutan tampil di halaman publik.</small>
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

<!-- ========================= -->
<!--     PEMBIAYAAN DESA       -->
<!-- ========================= -->

<div class="d-flex justify-content-between align-items-center mb-3 mt-5">
    <h4 class="fw-bold mb-0">Pembiayaan Desa</h4>
    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambahPembiayaan">
        + Tambah Pembiayaan
    </button>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle mb-0">
        <thead class="table-light">
            <tr class="text-center">
                <th style="width: 60px;">No</th>
                <th>Uraian</th>
                <th>Jumlah (Rp)</th>
                <th>Tahun</th>
                <th>Keterangan</th>
                <th style="width: 80px;">Urutan</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pembiayaan)): ?>
                <?php $no = 1; ?>
                <?php foreach ($pembiayaan as $row): ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= esc($row['uraian']) ?></td>
                        <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                        <td><?= esc($row['tanggal_pembiayaan']) ?></td>
                        <td><?= esc($row['keterangan']) ?></td>
                        <td class="text-center"><?= esc($row['urutan']) ?></td>
                        <td class="text-center">
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditPembiayaan<?= $row['id_pembiayaan'] ?>">
                                Edit
                            </button>

                            <!-- Tombol Delete -->
                            <a href="<?= base_url('admin/apbdes/pembiayaan/delete/' . $row['id_pembiayaan']) ?>"
                                onclick="return confirm('Hapus pembiayaan ini?')"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>

                    <!-- Modal Edit Pembiayaan -->
                    <div class="modal fade" id="modalEditPembiayaan<?= $row['id_pembiayaan'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= base_url('admin/apbdes/pembiayaan/update/' . $row['id_pembiayaan']) ?>" method="post">
                                    <?= csrf_field() ?>

                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Pembiayaan Desa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Uraian</label>
                                            <input type="text" name="uraian" class="form-control"
                                                value="<?= esc($row['uraian']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jumlah (Rp)</label>
                                            <input type="number" name="jumlah" class="form-control"
                                                value="<?= esc($row['jumlah']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Pembiayaan</label>
                                            <input type="date" name="tanggal_pembiayaan" class="form-control"
                                                value="<?= esc($row['tanggal_pembiayaan']) ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="3"><?= esc($row['keterangan']) ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Urutan</label>
                                            <input type="number" name="urutan" class="form-control"
                                                value="<?= esc($row['urutan']) ?>" required>
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
                    <td colspan="6" class="text-center text-muted">Belum ada data Pembiayaan Desa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Pembiayaan -->
<div class="modal fade" id="modalTambahPembiayaan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/apbdes/pembiayaan/store') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id_apbdes" value="<?= esc($id_apbdes) ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pembiayaan Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Uraian</label>
                        <input type="text" name="uraian" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah (Rp)</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Pembiayaan</label>
                        <input type="date" name="tanggal_pembiayaan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Urutan</label>
                        <input type="number" name="urutan" class="form-control" value="0" required>
                        <small class="text-muted">Gunakan untuk mengatur urutan tampilan.</small>
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