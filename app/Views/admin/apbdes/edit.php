<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3>Edit APBDes</h3>

<form action="<?= base_url('admin/apbdes/update/'.$row['id_apbdes']) ?>" method="post">
    <div class="mb-3">
        <label>Tahun</label>
        <input type="text" name="tahun" class="form-control" value="<?= $row['tahun'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"><?= $row['deskripsi'] ?></textarea>
    </div>
    <div class="mb-3">
        <label>Total Pendapatan</label>
        <input type="number" name="total_pendapatan" class="form-control" value="<?= $row['total_pendapatan'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Total Belanja</label>
        <input type="number" name="total_belanja" class="form-control" value="<?= $row['total_belanja'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Total Pembiayaan</label>
        <input type="number" name="total_pembiayaan" class="form-control" value="<?= $row['total_pembiayaan'] ?>" required>
    </div>
    <div class="mb-3">
        <label>SILPA</label>
        <input type="number" name="silpa" class="form-control" value="<?= $row['silpa'] ?>" required>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/apbdes') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>