<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/beranda', 'Home::index');
$routes->get('sejarah', 'SejarahController::index');
$routes->get('visimisi', 'VimiController::index');
$routes->get('struktur', 'StrukturController::struktur');
$routes->get('struktur/(:segment)', 'StrukturController::detail/$1');
$routes->get('perangkat', 'PerangkatController::index');
$routes->get('berita', 'BeritaController::index');
$routes->get('berita/(:segment)', 'BeritaController::detail/$1');
$routes->get('pengumuman', 'PengumumanController::index');
$routes->get('pengumuman/(:segment)', 'PengumumanController::detail/$1');
$routes->get('agenda', 'AgendaController::index');
$routes->get('agenda/(:segment)', 'AgendaController::detail/$1');
$routes->get('penduduk', 'PendudukController::index');
$routes->get('wilayah', 'WilayahController::index');
$routes->get('lembaga', 'LembagaController::index');
$routes->get('lembaga/(:segment)', 'LembagaController::detail/$1');
$routes->get('sarana_prasarana', 'SarprasController::index');
$routes->get('detailPrasarana/(:num)', 'SarprasController::detailPrasarana/$1');
$routes->get('detailTanah/(:num)', 'SarprasController::detailTanah/$1');
$routes->get('APBDes', 'APBDesController::index');
$routes->get('realisasi_anggaran', 'RealranController::index');
$routes->get('pembangunan', 'PembangunanController::index');
$routes->get('pembangunan/(:segment)', 'PembangunanController::detail/$1');
$routes->get('persuratan', 'PersuratanController::index');
$routes->get('layanan_mandiri', 'LamanController::index');
$routes->get('informasi_layanan', 'InforlayananController::index');
$routes->get('kontak', 'KontakController::index');
$routes->get('kritik', 'KritikController::index');
$routes->post('kritik/store', 'KritikController::store');
$routes->get('pengaduan', 'PengaduanController::index');
$routes->post('pengaduan/store', 'PengaduanController::store');

// LOGIN ADMIN
$routes->get('login', 'AuthController::login');
$routes->post('login/process', 'AuthController::processLogin');
$routes->post('logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // ADMIN DASHBOARD
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // ADMIN SEJARAH
    $routes->get('sejarah', 'Admin\SejarahController::index');
    $routes->get('sejarah/create', 'Admin\SejarahController::create');
    $routes->post('sejarah/store', 'Admin\SejarahController::store');
    $routes->get('sejarah/edit/(:num)', 'Admin\SejarahController::edit/$1');
    $routes->post('sejarah/update/(:num)', 'Admin\SejarahController::update/$1');
    $routes->get('sejarah/delete/(:num)', 'Admin\SejarahController::delete/$1');

    // ADMIN VISI MISI
    $routes->get('visimisi', 'Admin\VisimisiController::index');
    $routes->get('visimisi/create', 'Admin\VisiMisiController::create');
    $routes->post('visimisi/store', 'Admin\VisiMisiController::store');
    $routes->get('visimisi/edit/(:num)', 'Admin\VisimisiController::edit/$1');
    $routes->post('visimisi/update/(:num)', 'Admin\VisimisiController::update/$1');
    $routes->get('visimisi/delete/(:num)', 'Admin\VisimisiController::delete/$1');

    // ADMIN BERITA
    $routes->get('berita', 'Admin\BeritaController::index');
    $routes->get('berita/create', 'Admin\BeritaController::create');
    $routes->post('berita/store', 'Admin\BeritaController::store');
    $routes->get('berita/edit/(:num)', 'Admin\BeritaController::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\BeritaController::update/$1');
    $routes->get('berita/delete/(:num)', 'Admin\BeritaController::delete/$1');

    // ADMIN PENGUMUMAN
    $routes->get('pengumuman', 'Admin\PengumumanController::index');
    $routes->get('pengumuman/create', 'Admin\PengumumanController::create');
    $routes->post('pengumuman/store', 'Admin\PengumumanController::store');
    $routes->get('pengumuman/edit/(:num)', 'Admin\PengumumanController::edit/$1');
    $routes->post('pengumuman/update/(:num)', 'Admin\PengumumanController::update/$1');
    $routes->get('pengumuman/delete/(:num)', 'Admin\PengumumanController::delete/$1');

    // // Admin Agenda
    $routes->get('agenda', 'Admin\AgendaController::index');
    $routes->get('agenda/create', 'Admin\AgendaController::create');
    $routes->post('agenda/store', 'Admin\AgendaController::store');
    $routes->get('agenda/edit/(:num)', 'Admin\AgendaController::edit/$1');
    $routes->post('agenda/update/(:num)', 'Admin\AgendaController::update/$1');
    $routes->get('agenda/delete/(:num)', 'Admin\AgendaController::delete/$1');

    // ADMIN STRUKTUR
    $routes->get('struktur', 'Admin\StrukturController::index');
    $routes->get('struktur/create', 'Admin\StrukturController::create');
    $routes->post('struktur/store', 'Admin\StrukturController::store');
    $routes->get('struktur/edit/(:num)', 'Admin\StrukturController::edit/$1');
    $routes->post('struktur/update/(:num)', 'Admin\StrukturController::update/$1');
    $routes->post('struktur/delete/(:num)', 'Admin\StrukturController::delete/$1');

    // ADMIN PERANGKAT
    $routes->get('perangkat', 'Admin\PerangkatController::index');
    $routes->get('perangkat/create', 'Admin\PerangkatController::create');
    $routes->post('perangkat/store', 'Admin\PerangkatController::store');
    $routes->get('perangkat/edit/(:num)', 'Admin\PerangkatController::edit/$1');
    $routes->post('perangkat/update/(:num)', 'Admin\PerangkatController::update/$1');
    $routes->get('perangkat/delete/(:num)', 'Admin\PerangkatController::delete/$1');

    // ADMIN PENDUDUK
    $routes->get('penduduk', 'Admin\PendudukController::index');
    $routes->get('penduduk/create', 'Admin\PendudukController::create');
    $routes->post('penduduk/store', 'Admin\PendudukController::store');
    $routes->get('penduduk/edit/(:num)', 'Admin\PendudukController::edit/$1');
    $routes->post('penduduk/update/(:num)', 'Admin\PendudukController::update/$1');
    $routes->get('penduduk/delete/(:num)', 'Admin\PendudukController::delete/$1');

    // ADMIN WILAYAH
    $routes->get('wilayah', 'Admin\WilayahController::index');
    $routes->get('wilayah/create', 'Admin\WilayahController::create');
    $routes->post('wilayah/store', 'Admin\WilayahController::store');
    $routes->get('wilayah/edit/(:num)', 'Admin\WilayahController::edit/$1');
    $routes->post('wilayah/update/(:num)', 'Admin\WilayahController::update/$1');
    $routes->get('wilayah/delete/(:num)', 'Admin\WilayahController::delete/$1');

    // ADMIN LEMBAGA
    $routes->get('lembaga', 'Admin\LembagaController::index');
    $routes->get('lembaga/create', 'Admin\LembagaController::create');
    $routes->post('lembaga/store', 'Admin\LembagaController::store');
    $routes->get('lembaga/edit/(:num)', 'Admin\LembagaController::edit/$1');
    $routes->post('lembaga/update/(:num)', 'Admin\LembagaController::update/$1');
    $routes->get('lembaga/delete/(:num)', 'Admin\LembagaController::delete/$1');

    // ADMIN SARPRAS
    $routes->get('sarpra', 'Admin\SarpraController::index');
    $routes->get('sarpra/create', 'Admin\SarpraController::create');
    $routes->post('sarpra/store', 'Admin\SarpraController::store');
    $routes->get('sarpra/edit/(:num)', 'Admin\SarpraController::edit/$1');
    $routes->post('sarpra/update/(:num)', 'Admin\SarpraController::update/$1');
    $routes->get('sarpra/delete/(:num)', 'Admin\SarpraController::delete/$1');

    $routes->post('sarpra/prasarana/store', 'Admin\SarpraController::storePoint');
    $routes->post('sarpra/prasarana/update/(:num)', 'Admin\SarpraController::updatePoint/$1');
    $routes->get('sarpra/prasarana/delete/(:num)', 'Admin\SarpraController::deletePoint/$1');

    $routes->post('sarpra/tanah/store', 'Admin\SarpraController::storeTanah');
    $routes->post('sarpra/tanah/update/(:num)', 'Admin\SarpraController::updateTanah/$1');
    $routes->get('sarpra/tanah/delete/(:num)', 'Admin\SarpraController::deleteTanah/$1');

    // ADMIN APBDES
    $routes->get('apbdes', 'Admin\ApbdesController::index');
    $routes->get('apbdes/create', 'Admin\ApbdesController::create');
    $routes->post('apbdes/store', 'Admin\ApbdesController::store');
    $routes->get('apbdes/edit/(:num)', 'Admin\ApbdesController::edit/$1');
    $routes->post('apbdes/update/(:num)', 'Admin\ApbdesController::update/$1');
    $routes->get('apbdes/delete/(:num)', 'Admin\ApbdesController::delete/$1');
    $routes->get('apbdes/perbarui/(:num)', 'Admin\ApbdesController::perbarui/$1');

    // PENDAPATAN DESA ROUTES
    $routes->post('apbdes/pendapatan/store', 'Admin\ApbdesController::pendapatan_store');
    $routes->post('apbdes/pendapatan/update/(:num)', 'Admin\ApbdesController::pendapatan_update/$1');
    $routes->get('apbdes/pendapatan/delete/(:num)', 'Admin\ApbdesController::pendapatan_delete/$1');

    // PEMBIAYAAN DESA ROUTES
    $routes->post('apbdes/pembiayaan/store', 'Admin\ApbdesController::pembiayaan_store');
    $routes->post('apbdes/pembiayaan/update/(:num)', 'Admin\ApbdesController::pembiayaan_update/$1');
    $routes->get('apbdes/pembiayaan/delete/(:num)', 'Admin\ApbdesController::pembiayaan_delete/$1');


    // ADMIN ANGGARAN
    $routes->get('realisasi', 'Admin\RealisasiAnggaranController::index');
    $routes->get('realisasi/create', 'Admin\RealisasiAnggaranController::create');
    $routes->post('realisasi/store', 'Admin\RealisasiAnggaranController::store');
    $routes->get('realisasi/edit/(:num)', 'Admin\RealisasiAnggaranController::edit/$1');
    $routes->post('realisasi/update/(:num)', 'Admin\RealisasiAnggaranController::update/$1');
    $routes->get('realisasi/delete/(:num)', 'Admin\RealisasiAnggaranController::delete/$1');

    // ADMIN PEMBANGUNAN
    $routes->get('pembangunan', 'Admin\\PembangunanController::index');
    $routes->get('pembangunan/create', 'Admin\\PembangunanController::create');
    $routes->post('pembangunan/store', 'Admin\\PembangunanController::store');
    $routes->get('pembangunan/edit/(:num)', 'Admin\\PembangunanController::edit/$1');
    $routes->post('pembangunan/update/(:num)', 'Admin\\PembangunanController::update/$1');
    $routes->get('pembangunan/delete/(:num)', 'Admin\\PembangunanController::delete/$1');

    // ADMIN PERSURATAN
    $routes->get('persuratan', 'Admin\PersuratanController::index');
    $routes->get('persuratan/create', 'Admin\PersuratanController::create');
    $routes->post('persuratan/store', 'Admin\PersuratanController::store');
    $routes->get('persuratan/edit/(:num)', 'Admin\PersuratanController::edit/$1');
    $routes->post('persuratan/update/(:num)', 'Admin\PersuratanController::update/$1');
    $routes->get('persuratan/delete/(:num)', 'Admin\PersuratanController::delete/$1');

    // ADMIN KRITIK
    $routes->get('kritik', 'Admin\KritikController::index');

    // ADMIN PENGADUAN
    $routes->get('pengaduan', 'Admin\PengaduanController::index');
    $routes->post('pengaduan/kategori/store', 'Admin\PengaduanController::kategori_store');
    $routes->post('pengaduan/kategori/update/(:num)', 'Admin\PengaduanController::kategori_update/$1');
    $routes->get('pengaduan/kategori/delete/(:num)', 'Admin\PengaduanController::kategori_delete/$1');
});
