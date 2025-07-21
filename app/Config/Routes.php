<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// === Rute untuk Pengguna Umum (User) ===
$routes->get('/', 'Home::index');
$routes->get('/produk/(:segment)', 'Home::detail/$1');
$routes->get('/produk', 'Home::index');
$routes->get('/beranda', 'Home::index');

// === Rute untuk Autentikasi (Login, Register, Logout) ===
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::attemptRegister');
$routes->get('/logout', 'AuthController::logout');

// === Rute untuk Keranjang Belanja & Pesanan (Membutuhkan Login) ===
$routes->group('', ['filter' => 'userauth'], static function ($routes) {
    $routes->post('/keranjang/tambah', 'KeranjangController::tambah');
    $routes->get('/keranjang', 'KeranjangController::index');
    $routes->post('/keranjang/update', 'KeranjangController::update');
    $routes->get('/keranjang/hapus/(:any)', 'KeranjangController::hapus/$1');
    $routes->get('/checkout', 'PesananController::checkout');
    $routes->post('/pesanan/buat', 'PesananController::buatPesanan');
    $routes->get('/pesanan/sukses', 'PesananController::sukses');
});


// === Rute untuk Halaman Admin (Membutuhkan Login sebagai Admin) ===
$routes->group('admin', ['filter' => 'adminauth'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('dashboard', 'Admin\DashboardController::index');
    
    // Rute untuk CRUD Produk
    $routes->get('produk', 'Admin\ProdukController::index');
    $routes->get('produk/baru', 'Admin\ProdukController::new');
    $routes->post('produk/create', 'Admin\ProdukController::create');
    $routes->get('produk/edit/(:num)', 'Admin\ProdukController::edit/$1');
    $routes->post('produk/update/(:num)', 'Admin\ProdukController::update/$1');
    $routes->get('produk/hapus/(:num)', 'Admin\ProdukController::delete/$1');

    // Rute untuk Manajemen Pesanan
    $routes->get('pesanan', 'Admin\PesananController::index');
    $routes->get('pesanan/(:num)', 'Admin\PesananController::detail/$1');
    $routes->post('pesanan/update_status/(:num)', 'Admin\PesananController::updateStatus/$1');
});


/* ------- Additional Routing ------- */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
