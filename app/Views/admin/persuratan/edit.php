<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h3 class="mb-4">Edit Permohonan Surat</h3>

    <form action="<?= base_url('admin/persuratan/update/'.$persuratan['id']) ?>" method="post">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $persuratan['nama'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="<?= $persuratan['nik'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Surat</label>
            <input type="text" name="jenis_surat" value="<?= $persuratan['jenis_surat'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"><?= $persuratan['keterangan'] ?></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" <?= $persuratan['status']=='pending'?'selected':'' ?>>Pending</option>
                <option value="diproses" <?= $persuratan['status']=='diproses'?'selected':'' ?>>Diproses</option>
                <option value="selesai" <?= $persuratan['status']=='selesai'?'selected':'' ?>>Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= base_url('admin/persuratan') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
