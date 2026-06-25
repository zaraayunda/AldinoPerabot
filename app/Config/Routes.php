<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Layout::index');
$routes->get('/dashboard', 'Layout::dashboard');
$routes->get('/login', 'Layout::login');
$routes->get('/registrasi', 'Layout::registrasi');
$routes->post('/login/ceklogin', 'Login::ceklogin');
$routes->get('/logout', 'Login::logout');
$routes->post('/registrasi/simpan', 'Login::simpanregistrasi');
$routes->get('/homepage/loadmore', 'Layout::loadMore');

/** PENGGUNA */
$routes->get('/datapengguna', 'Pengguna::index');
$routes->get('/tambahpengguna', 'Pengguna::tambahdata');
$routes->post('/pengguna/simpan', 'Pengguna::simpan');
$routes->get('/editpengguna/(:segment)', 'Pengguna::edit/$1');
$routes->post('/pengguna/update', 'Pengguna::update');
$routes->get('/hapuspengguna/(:segment)', 'Pengguna::hapus/$1');

/** KATEGORI */
$routes->get('/datakategori', 'Kategori::index');
$routes->get('/tambahkategori', 'Kategori::tambahdata');
$routes->post('/kategori/simpan', 'Kategori::simpan');
$routes->get('/editkategori/(:segment)', 'Kategori::edit/$1');
$routes->post('/kategori/update', 'Kategori::update');
$routes->get('/hapuskategori/(:segment)', 'Kategori::hapus/$1');

/** PELANGGAN */
$routes->get('/datapelanggan', 'Pelanggan::index');
$routes->get('/tambahpelanggan', 'Pelanggan::tambahdata');
$routes->post('/pelanggan/simpan', 'Pelanggan::simpan');
$routes->get('/editpelanggan/(:segment)/(:segment)','Pelanggan::edit/$1/$2');
$routes->post('/pelanggan/update', 'Pelanggan::update');
$routes->get('/hapuspelanggan/(:segment)', 'Pelanggan::hapus/$1');

/** PRODUK */
$routes->get('/dataproduk', 'Produk::index');
$routes->get('/tambahproduk', 'Produk::tambahdata');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->get('/editproduk/(:segment)', 'Produk::edit/$1');
$routes->post('/produk/update', 'Produk::update');
$routes->get('/hapusproduk/(:segment)', 'Produk::hapus/$1');

/** PESANAN */
$routes->get('/datapesanan', 'PesananController::index');
$routes->get('/tambahpesanan', 'PesananController::tambahdata');
$routes->post('/pesanan/simpan', 'PesananController::simpan');
$routes->post('/pesanan/updatestatus','PesananController::updateStatus');
$routes->get('/editpesanan/(:segment)', 'PesananController::edit/$1');
$routes->post('pesanan/update', 'PesananController::update');
$routes->get('/hapuspesanan/(:segment)', 'PesananController::hapus/$1');
$routes->get('/pesananpelanggan', 'PesananController::pesananpelanggan');
$routes->get('/pesananpelanggan/batal/(:segment)', 'PesananController::pesananbatal/$1');

/** PEMBAYARAN */
$routes->get('/datapembayaran', 'PembayaranController::index');
$routes->post('/pembayaran/updatestatus','PembayaranController::updateStatus');
$routes->get('/tambahpembayaran', 'PembayaranController::tambahdata');
$routes->post('/pembayaran/simpan', 'PembayaranController::simpan');
$routes->get('/editpembayaran/(:segment)', 'PembayaranController::edit/$1');
$routes->post('pembayaran/update', 'PembayaranController::update');
$routes->get('/hapuspembayaran/(:segment)', 'PembayaranController::hapus/$1');

/** PELANGGAN - HOMEPAGE */
$routes->get('/homepage', 'Layout::homepage');
$routes->get('/katalogproduk', 'Layout::katalog');
$routes->get(
    'masukkeranjang/(:segment)',
    'KeranjangController::simpan/$1'
);
$routes->get('/customproduk', 'PengajuanCustomController::index');
$routes->post('/customproduk/simpan', 'PengajuanCustomController::simpan');
$routes->get('/datapengajuan', 'PengajuanCustomController::datapengajuan');
// $routes->post('/pengajuan/updatestatus','PengajuanCustomController::updateStatus');
$routes->get('/editpengajuan/(:segment)', 'PengajuanCustomController::edit/$1');
$routes->post('/pengajuan/updateharga', 'PengajuanCustomController::updateHarga');
$routes->get('/hapuspengajuan/(:segment)', 'PengajuanCustomController::hapus/$1');

$routes->get('/pengajuan-custom', 'PengajuanCustomController::pengajuancustom');
$routes->get('customproduk/setuju/(:segment)', 'PengajuanCustomController::customsetuju/$1');
$routes->get('customproduk/batal/(:segment)', 'PengajuanCustomController::custombatal/$1');

/** KERANJANG**/
$routes->get('/keranjang', 'KeranjangController::tampilankeranjang');
$routes->post('checkout', 'KeranjangController::checkout');
$routes->post('checkout/simpan', 'KeranjangController::simpanCheckout');