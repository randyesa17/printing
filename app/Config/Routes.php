<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('produk', 'Home::produk');
$routes->get('cara', 'Home::cara');
$routes->match(['post', 'get'], 'admin/login', 'Admin/Admin::login');
$routes->group('admin', ['filter' => 'AuthAdmin'], function($routes){
	$routes->add('/', 'Admin\Home::index');
	$routes->add('produk', 'Admin\Produk::index');
	$routes->add('produk/desain', 'Admin\Produk::desain');
	$routes->add('produk/desain/tambah', 'Admin\Produk::tambahdesain');
	$routes->add('produk/desain/ubah', 'Admin\Produk::ubahdesain');
	$routes->add('produk/tambah', 'Admin\Produk::tambah');
	$routes->add('produk/ubah', 'Admin\Produk::ubah');
	$routes->add('produk/hapus', 'Admin\Produk::hapus');
	$routes->add('daerah', 'Admin\Daerah::index');
	$routes->add('daerah/tambah', 'Admin\Daerah::tambah');
	$routes->add('daerah/ubah', 'Admin\Daerah::ubah');
	$routes->add('daerah/hapus', 'Admin\Daerah::hapus');
	$routes->add('transaksi', 'Admin\Pesanan::index');
	$routes->add('transaksi/verifikasi', 'Admin\Pesanan::verifikasi');
	$routes->add('transaksi/kirim', 'Admin\Pesanan::kirim');
	$routes->add('pengiriman', 'Admin\Pengiriman::index');
	$routes->add('laporan', 'Admin\Laporan::index');
	$routes->add('laporan/cari', 'Admin\Laporan::cari');
	$routes->add('atur', 'Admin\Admin::index');
	$routes->add('atur/tambah', 'Admin\Admin::tambah');
	$routes->add('atur/hapus', 'Admin\Admin::hapus');
	$routes->add('logout', 'Admin\Admin::logout');
});
$routes->match(['post', 'get'], 'user/daftar', 'User/User::daftar');
$routes->match(['post', 'get'], 'user/login', 'User/User::login');
$routes->group('user', ['filter' => 'AuthUser'], function($routes){
	$routes->add('/', 'User\Home::index');
	$routes->add('produk', 'User\Produk::index');
	$routes->add('produk/detail', 'User\Produk::detail');
	$routes->add('produk/keluar', 'User\Produk::keluar');
	$routes->add('keranjang', 'User\Keranjang::index');
	$routes->add('keranjang/update', 'User\Keranjang::update');
	$routes->add('keranjang/checkout', 'User\Keranjang::checkout');
	$routes->add('pesanan', 'User\Pesanan::index');
	$routes->add('pesanan/masuk', 'User\Pesanan::masuk');
	$routes->add('pesanan/bayar', 'User\Pesanan::bayar');
	$routes->add('pesanan/terima', 'User\Pesanan::terima');
	$routes->add('profil', 'User\User::profil');
	$routes->add('profil/ubah', 'User\User::ubah');
	$routes->add('logout', 'User\User::logout');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}