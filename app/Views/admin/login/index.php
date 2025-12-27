<?= $this->extend('admin/template/login') ?>
<?= $this->section('content') ?>

<div class="row g-0 app-auth-wrapper">
    <!-- Kolom Form Login -->
    <div class="col-12 col-md-6 auth-main-col text-center p-5">
        <div class="app-auth-body mx-auto">

            <div class="app-auth-branding mb-4">
                <a class="app-logo" href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/admin/img/logo.jpeg') ?>" alt="Logo Desa">
                </a>
            </div>

            <h2 class="auth-heading text-center mb-4">Login Website Desa</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/process') ?>" method="post" autocomplete="on" class="text-start">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" name="username" type="text" autocomplete="username" class="form-control" placeholder="Masukkan username" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-wrapper">
                        <input id="password" name="password" type="password" autocomplete="current-password" class="form-control" placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-2">
                    <button type="submit" class="btn btn-primary flex-fill">Login</button>
                    <a href="<?= base_url('beranda') ?>" class="btn btn-secondary flex-fill">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Kolom Background -->
    <div class="col-12 col-md-6 auth-background-col"></div>
</div>

<?= $this->endSection() ?>