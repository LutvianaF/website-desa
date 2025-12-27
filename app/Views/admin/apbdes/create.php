<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="mb-3">Tambah APBDes</h3>

<form action="<?= base_url('admin/apbdes/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Tahun</label>
        <input type="text" name="tahun" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi (opsional)</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <hr>

    <div class="mb-3">
        <label class="form-label">Total Rencana Belanja (otomatis)</label>
        <input type="text" class="form-control"
            value="<?= 'Rp' . number_format($totalPendapatan, 0, ',', '.') ?>"
            readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Total Pendapatan (otomatis)</label>
        <input type="text" class="form-control"
            value="<?= 'Rp' . number_format($totalPendapatan, 0, ',', '.') ?>"
            readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Total Belanja (otomatis)</label>
        <input type="text" class="form-control"
            value="<?= 'Rp' . number_format($totalBelanja, 0, ',', '.') ?>"
            readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Total Pembiayaan (otomatis)</label>
        <input type="text" class="form-control"
            value="<?= 'Rp' . number_format($totalPembiayaan, 0, ',', '.') ?>"
            readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">SILPA (otomatis)</label>
        <input type="text" class="form-control"
            value="<?= 'Rp' . number_format($silpa, 0, ',', '.') ?>"
            readonly>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/apbdes') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>