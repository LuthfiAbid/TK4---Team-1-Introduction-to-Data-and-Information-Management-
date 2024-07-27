<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hakAkses\HakAksesController;
use App\Http\Controllers\pengguna\PenggunaController;
use App\Http\Controllers\barang\BarangController;
use App\Http\Controllers\pembelian\PembelianController;
use App\Http\Controllers\supplier\SupplierController;
use App\Http\Controllers\penjualan\PenjualanController;
use App\Http\Controllers\pelanggan\PelangganController;
use App\Http\Controllers\labaRugi\LabaRugiController;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::prefix('hak_akses')->group(function () {
    Route::get('/index', [HakAksesController::class, 'index'])->name('akses.index');
    Route::get('/create', [HakAksesController::class, 'create'])->name('akses.create');
    Route::post('/store', [HakAksesController::class, 'store'])->name('akses.store');
    Route::get('/edit/{id}', [HakAksesController::class, 'edit'])->name('akses.edit');
    Route::put('/update/{id}', [HakAksesController::class, 'update'])->name('akses.update');
    Route::delete('/delete/{id}', [HakAksesController::class, 'destroy'])->name('akses.destroy');
});

Route::prefix('pengguna')->group(function () {
    Route::get('/index', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::put('/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/delete/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});

Route::prefix('barang')->group(function () {
    Route::get('/index', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::prefix('pembelian')->group(function () {
    Route::get('/index', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/edit/{id}', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::put('/update/{id}', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::delete('/delete/{id}', [PembelianController::class, 'destroy'])->name('pembelian.destroy');
});

Route::prefix('supplier')->group(function () {
    Route::get('/index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
});

Route::prefix('penjualan')->group(function () {
    Route::get('/index', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/delete/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
});

Route::prefix('pelanggan')->group(function () {
    Route::get('/index', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/delete/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
});

Route::get('/labarugi', [LabaRugiController::class, 'index'])->name('labarugi.index');