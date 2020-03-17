<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', function () {
        return view('dashboard');
    });

    //Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Ganti Password
    Route::get('/ganti_password', 'HomeController@ganti_password'); 
    Route::post('/ganti_password/aksi', 'HomeController@ganti_password_aksi');

    //Kategori
    Route::get('/kategori', 'KategoriController@index');
    Route::get('/kategori/tambah', 'KategoriController@tambah');
    Route::post('/kategori/aksi', 'KategoriController@aksi');
    Route::get('/kategori/edit/{id}', 'KategoriController@edit');
    Route::put('/kategori/update/{id}', 'KategoriController@update');
    Route::get('/kategori/hapus/{id}', 'KategoriController@hapus');

    //Transaksi
    Route::get('/transaksi', 'TransaksiController@index');
    Route::get('/transaksi/tambah', 'TransaksiController@tambah');
    Route::post('/transaksi/aksi', 'TransaksiController@aksi');
    Route::get('/transaksi/edit/{id}', 'TransaksiController@edit');
    Route::put('/transaksi/update/{id}', 'TransaksiController@update');
    Route::get('/transaksi/hapus/{id}', 'TransaksiController@hapus');
    Route::get('/transaksi/cari', 'TransaksiController@cari');
    
    Route::get('/pesanan', 'TransaksiController@pesanan');
    Route::get('/pesanan/pesanan_edit/{id}', 'TransaksiController@pesanan_edit');
    Route::put('/pesanan/pesanan_update/{id}', 'TransaksiController@pesanan_update');
    Route::get('/pesanan/detail_pesanan/{id}', 'TransaksiController@detail_pesanan');
    Route::get('/pesanan/detail_edit/{id}', 'TransaksiController@detail_edit');
    Route::put('/pesanan/detail_update/{id}', 'TransaksiController@detail_update');
    Route::get('/pesanan/cari', 'TransaksiController@cari_pesanan');

    //Laporan Keuangan
    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporan/hasil', 'LaporanController@hasil');
    Route::get('/laporan/print', 'LaporanController@print');
    Route::get('/laporan/excel', 'LaporanController@excel');

    //Pengguna ePakan
    Route::get('/mitra', 'PenggunaController@mitra');
    Route::get('/pelanggan', 'PenggunaController@pelanggan');
    Route::get('/mitra/cari', 'PenggunaController@cari_mitra');
    Route::get('/pelanggan/cari', 'PenggunaController@cari_pelanggan');
    Route::get('/pelanggan/verifikasi/{id}', 'PenggunaController@verifikasi');
    Route::put('/pelanggan/verifikasi_update/{id}', 'PenggunaController@verifikasi_update');

    //Gmpas Pelanggan
    Route::get('/maps', 'PenggunaController@maps');

    //Saldo
    Route::get('/saldo', 'SaldoController@saldo');
    Route::get('/saldo/edit/{id}', 'SaldoController@edit_saldo');
    Route::put('/saldo/update/{id}', 'SaldoController@update_saldo');
    Route::get('/saldo/hapus/{id}', 'SaldoController@hapus_saldo');
    Route::get('/pencairan', 'SaldoController@pencairan');
    Route::get('/pencairan/cairkan/{id}', 'SaldoController@cairkan');
    Route::put('/pencairan/cairkan_proses/{id}', 'SaldoController@cairkan_proses');
    Route::get('/pencairan/hapus_cair/{id}', 'SaldoController@hapus_cair');
});

Auth::routes([ 
    'register' => false, 
    'reset' => false 
   ]); 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');


