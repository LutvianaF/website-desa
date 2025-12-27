<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<?php
    // Data pembangunan
    $imgPath = !empty($pembangunan['foto'])
        ? base_url('uploads/pembangunan/' . $pembangunan['foto'])
        : base_url('assets/img/artikel.jpeg');

    $alt       = $pembangunan['alt_foto'] ?: 'Foto Pembangunan Desa';
    $progres   = (int) ($pembangunan['progres'] ?? 0);
    $anggaran  = (float) ($pembangunan['anggaran'] ?? 0);
?>

<section id="detail-pembangunan" class="py-5">
    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-4">
            <h2 class="fw-bold"><?= esc($pembangunan['nama_pembangunan']) ?></h2>
            <p class="text-muted mb-0">
                <i class="bi bi-geo-alt"></i> <?= esc($pembangunan['lokasi']) ?>
            </p>
        </div>

        <!-- Gambar Utama -->
        <div class="mb-4">
            <img 
                src="<?= $imgPath ?>" 
                alt="<?= esc($alt) ?>" 
                class="img-fluid w-100 rounded shadow-sm"
                style="max-height: 420px; object-fit: cover;"
            >
        </div>

        <div class="row">
            <div class="col-lg-8">

                <!-- Deskripsi -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3">Deskripsi Pembangunan</h4>
                        <p class="text-muted" style="line-height: 1.7;">
                            <?= nl2br(esc($pembangunan['deskripsi'])) ?>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <!-- Informasi Tambahan -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">

                        <h5 class="fw-bold mb-3">Informasi</h5>

                        <p class="mb-2">
                            <span class="fw-semibold">Lokasi:</span><br>
                            <?= esc($pembangunan['lokasi']) ?>
                        </p>

                        <?php if ($anggaran > 0): ?>
                        <p class="mb-2">
                            <span class="fw-semibold">Anggaran:</span><br>
                            Rp<?= number_format($anggaran, 0, ',', '.') ?>
                        </p>
                        <?php endif; ?>

                        <div class="mb-2">
                            <span class="fw-semibold">Progres:</span>
                            <div class="d-flex justify-content-between small">
                                <span><?= $progres ?>%</span>
                            </div>

                            <div class="progress" style="height: 8px;">
                                <div
                                    class="progress-bar bg-success"
                                    role="progressbar"
                                    style="width: <?= $progres ?>%;"
                                    aria-valuenow="<?= $progres ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($pembangunan['created_at'])): ?>
                        <p class="text-muted small mt-3 mb-0">
                            <i class="bi bi-clock-history"></i>
                            Dibuat: <?= date('d F Y', strtotime($pembangunan['created_at'])) ?>
                        </p>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>
