<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-2">
    <h3 class="fw-bold">Data Pembangunan Desa</h3>
    <a href="<?= site_url('admin/pembangunan/create') ?>" class="btn btn-primary">+ Tambah Data</a>
</div>

<div class="table-responsive shadow-sm bg-white p-3 rounded">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr class="text-center">
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Anggaran</th>
                <th>Progres</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($pembangunan)): ?>
                <?php $no = 1; ?>
                <?php foreach ($pembangunan as $row): ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>

                        <!-- Foto -->
                        <td>
                            <?php if (!empty($row['foto'])): ?>
                                <img src="<?= base_url('uploads/pembangunan/' . $row['foto']) ?>"
                                    alt="<?= esc($row['alt_foto']) ?>"
                                    width="70"
                                    class="rounded">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada foto</span>
                            <?php endif; ?>
                        </td>

                        <td><?= esc($row['nama_pembangunan']) ?></td>
                        <td><?= esc($row['lokasi']) ?></td>
                        <td>Rp<?= number_format($row['anggaran'], 0, ',', '.') ?></td>
                        <td><?= $row['progres'] ?>%</td>

                        <td>
                            <a href="<?= site_url('admin/pembangunan/edit/' . $row['id_pembangunan']) ?>"
                                class="btn btn-warning btn-sm">Edit</a>

                            <a href="<?= site_url('admin/pembangunan/delete/' . $row['id_pembangunan']) ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data pembangunan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>