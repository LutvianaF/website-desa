<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section id="kritik">
  <div class="container">

    <div class="section-title text-center mb-5">
      <h2>Kritik Atau Saran</h2>
      <p>Sampaikan kritik Anda untuk meningkatkan layanan kami</p>
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
        <form action="<?= base_url('kritik/store') ?>" method="post" class="bg-white p-4 rounded shadow-sm">
          <?= csrf_field() ?>

          <div class="mb-3">
            <input type="text" name="name" class="form-control"
                   placeholder="Nama Anda" value="<?= old('name') ?>" required>
          </div>
          <div class="mb-3">
            <input type="email" name="email" class="form-control"
                   placeholder="Email Anda" value="<?= old('email') ?>" required>
          </div>
          <div class="mb-3">
            <textarea name="kritik" rows="5" class="form-control"
                      placeholder="Masukan Kritik atau Saran Anda" required><?= old('kritik') ?></textarea>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-danger px-4">Kirim</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
