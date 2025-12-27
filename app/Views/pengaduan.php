<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="pengaduan">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Pengaduan</h2>
      <p>Sampaikan pengaduan Anda agar segera ditindaklanjuti</p>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form action="<?= base_url('pengaduan/store') ?>" method="post" class="bg-light p-4 rounded shadow-sm">
          <?= csrf_field() ?>

          <div class="mb-3">
            <input
              type="text"
              name="name"
              class="form-control"
              placeholder="Nama Anda"
              value="<?= old('name') ?>"
              required>
          </div>

          <div class="mb-3">
            <input
              type="email"
              name="email"
              class="form-control"
              placeholder="Email Anda"
              value="<?= old('email') ?>"
              required>
          </div>

          <div class="mb-3">
            <select id="kategori" name="kategori" class="form-select" required>
              <option value="" disabled <?= old('kategori') ? '' : 'selected' ?>>Pilih Kategori Pengaduan</option>
              <?php if (!empty($kategori_pengaduan)): ?>
                <?php foreach ($kategori_pengaduan as $kat): ?>
                  <option value="<?= $kat['id_kategori_pengaduan'] ?>"
                    <?= old('kategori') == $kat['id_kategori_pengaduan'] ? 'selected' : '' ?>>
                    <?= esc($kat['nama_kategori']) ?>
                  </option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>

          <div class="mb-3">
            <textarea
              name="pengaduan"
              rows="5"
              class="form-control"
              placeholder="Tuliskan pengaduan Anda"
              required><?= old('pengaduan') ?></textarea>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-warning px-4">Kirim Pengaduan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>