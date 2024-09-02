<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;


Route::get('transaksi/compare', [TransaksiController::class, 'compareTransaksi']);
Route::apiResource('barang', BarangController::class);
Route::apiResource('jenis-barang', JenisBarangController::class);
Route::apiResource('transaksi', TransaksiController::class);
