<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-3">Tambah Penduduk</h3>

<form action="<?= base_url('admin/penduduk/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label>NIK</label>
        <input type="text" name="nik" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Dusun</label>
        <input type="text" name="dusun" class="form-control">
    </div>

    <div class="mb-3">
        <label>Pekerjaan</label>
        <input type="text" name="pekerjaan" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status Keluarga</label>
        <select name="status_keluarga" class="form-control">
            <option value="Anggota">Anggota</option>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('admin/penduduk') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
