<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Website Desa') ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css'); ?>" />

    <!-- Font Awesome (icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>
<body class="admin-page">

    <!-- Sidebar -->
    <div class="sidebar">
        <span class="close-btn" onclick="closeSidebar()">✖</span>
            <div class="logo-admin">
                <a class="logo-img">
                    <img src="<?= base_url('assets/admin/img/logo.jpeg') ?>" alt="Logo Desa">
                </a>
                <h2>Website Desa</h2>
            </div>
        <div class="sidebar-content">

            <a href="<?= base_url('admin/dashboard') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
            <i class="fa fa-home"></i> Dashboard
            </a>

            <a href="<?= base_url('admin/sejarah') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'sejarah' ? 'active' : '' ?>">
            <i class="fa fa-book"></i> Sejarah Desa
            </a>

            <a href="<?= base_url('admin/visimisi') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'visimisi' ? 'active' : '' ?>">
            <i class="fa fa-book"></i> Visi Misi
            </a>

            <a href="<?= base_url('admin/struktur') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'struktur' ? 'active' : '' ?>">
            <i class="fa fa-book"></i> Struktur Organisasi
            </a>

            <a href="<?= base_url('admin/perangkat') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'perangkat' ? 'active' : '' ?>">
            <i class="fa fa-book"></i> Perangkat Desa
            </a>

            <a href="<?= base_url('admin/berita') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'berita' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Berita
            </a>

            <a href="<?= base_url('admin/pengumuman') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'pengumuman' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Pengumuman
            </a>

            <a href="<?= base_url('admin/agenda') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'agenda' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Agenda
            </a>

            <a href="<?= base_url('admin/penduduk') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'penduduk' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Penduduk
            </a>

            <a href="<?= base_url('admin/wilayah') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'wilayah' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Wilayah
            </a>

            <a href="<?= base_url('admin/lembaga') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'lembaga' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Lembaga
            </a>

            <a href="<?= base_url('admin/sarpra') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'sarpra' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Sarana Prasarana
            </a>

            <a href="<?= base_url('admin/apbdes') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'apbdes' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> APBDes
            </a>

            <a href="<?= base_url('admin/realisasi') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'realisasi' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Realisasi Anggaran
            </a>

            <a href="<?= base_url('admin/pembangunan') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'pembangunan' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Pembangunan
            </a>

            <!-- <a href="<?= base_url('admin/persuratan') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'persuratan' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Persuratan
            </a> -->
            <a href="<?= base_url('admin/kritik') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'kritik' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Kritik
            </a>
            <a href="<?= base_url('admin/pengaduan') ?>" 
            class="sidebar-link <?= service('uri')->getSegment(2) == 'pengaduan' ? 'active' : '' ?>">
            <i class="fa fa-newspaper"></i> Pengaduan
            </a>

        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="topbar">
            <span class="menu-toggle" onclick="toggleSidebar()">&#9776;</span>
            <span>Manajemen Website Desa</span>
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="User" width="30" height="30" class="rounded-circle">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userMenu">
                    <li>
                    <form action="<?= base_url('logout') ?>" method="post" class="m-0">
                        <button type="submit" class="dropdown-item text-danger">Log Out</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/admin/js/script.js'); ?>"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const sidebarContent = document.querySelector(".sidebar-content");
            if (!sidebarContent) return;

            const ACTIVE_SELECTOR = ".sidebar-link.active";
            const STORAGE_KEY = "sidebar-scroll-pos";

            const savedScroll = localStorage.getItem(STORAGE_KEY);
            const activeItem = document.querySelector(ACTIVE_SELECTOR);

            if (savedScroll !== null) {
                // Jika posisi scroll tersimpan → pakai ini
                sidebarContent.scrollTop = parseInt(savedScroll);
            } 
            else if (activeItem) {
                // Jika belum pernah scroll → scroll ke item aktif
                const activeOffset = activeItem.offsetTop - 100; 
                sidebarContent.scrollTop = activeOffset;
            }

            // Simpan posisi scroll saat user scroll
            sidebarContent.addEventListener("scroll", function () {
                localStorage.setItem(STORAGE_KEY, sidebarContent.scrollTop);
            });

        });
    </script>

</body>
</html>
