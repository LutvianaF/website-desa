      <div class="header-bg">
        <img src="<?= base_url('uploads/profil/bg.jpeg') ?>" alt="Background Desa" class="bg-img">
        <div class="text-center mb-4">
          <img
            src="<?= base_url('assets/img/logo.jpeg') ?>" alt="Logo"
            alt="Logo"
            class="img-fluid pentagon-wrapper pentagon-img mb-3"
            style="width: 100px; height: 100px; object-fit: cover" />
          <h2 style="color: aliceblue">DESA SUKAMAJU LESTARI</h2>
        </div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-costum">
          <div class="container-fluid">
            <!--Tombol hamburger-->
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!--Menu-->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
              <ul class="navbar-nav">
                <li><a href="<?= base_url('beranda'); ?>">BERANDA</a></li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown">
                    PROFIL
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="<?= base_url('sejarah'); ?>">Sejarah</a>
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('visimisi'); ?>">Visi Misi</a></li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('struktur'); ?>">Struktur Organisasi</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('perangkat'); ?>">Perangkat Desa</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown">
                    BERITA
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= base_url('berita'); ?>">Berita</a></li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman Desa</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('agenda'); ?>">Agenda Desa</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown">
                    DATA & STATISTIK DESA
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="<?= base_url('penduduk'); ?>">Penduduk</a>
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('wilayah'); ?>">Wilayah</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('lembaga'); ?>">Lembaga</a></li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('sarana_prasarana'); ?>">Sarana Prasarana</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown">
                    INFORMASI
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= base_url('APBDes'); ?>">APBDes</a></li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('realisasi_anggaran'); ?>">Realisasi Anggaran</a>
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('pembangunan'); ?>">Pembangunan</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    role="button"
                    href="<?= base_url('informasi_layanan'); ?>">
                    INFORMASI LAYANAN
                  </a>
                  <!-- <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= base_url('persuratan'); ?>">Persuratan</a></li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('layanan_mandiri'); ?>"
                      >Layanan Mandiri</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('informasi_layanan'); ?>"
                      >Informasi Layanan</a
                    >
                  </li>
                </ul> -->
                </li>
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown">
                    KONTAK & PENGADUAN
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= base_url('kontak'); ?>">Kontak</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('kritik'); ?>">Kritik / Saran</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('pengaduan'); ?>">Pengaduan</a></li>
                  </ul>
                </li>
                <li><a href="<?= base_url('login'); ?>" class="btn-login">LOGIN</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>