<?= $this->extend('admin/template/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h3 class="mb-4">Tambah Permohonan Surat</h3>

    <form action="<?= base_url('admin/persuratan/store') ?>" method="post">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Surat</label>
            <select name="jenis_surat" class="form-control" required>
                <option value="">Pilih</option>
                <option>Surat Keterangan Domisili</option>
                <option>Surat Keterangan Usaha</option>
                <option>Surat Keterangan Tidak Mampu</option>
                <option>Surat Pengantar SKCK</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('admin/persuratan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>
