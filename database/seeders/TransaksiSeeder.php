<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaksi')->insert([
            ['barang_id' => 1, 'stok' => 100, 'jumlah_terjual' => 10, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '01-05-2021'), 'jenis_barang_id' => 1],
            ['barang_id' => 2, 'stok' => 100, 'jumlah_terjual' => 19, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '05-05-2021'), 'jenis_barang_id' => 1],
            ['barang_id' => 1, 'stok' => 90, 'jumlah_terjual' => 15, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '10-05-2021'), 'jenis_barang_id' => 1],
            ['barang_id' => 3, 'stok' => 100, 'jumlah_terjual' => 20, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '11-05-2021'), 'jenis_barang_id' => 2],
            ['barang_id' => 4, 'stok' => 100, 'jumlah_terjual' => 30, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '11-05-2021'), 'jenis_barang_id' => 2],
            ['barang_id' => 5, 'stok' => 100, 'jumlah_terjual' => 25, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '12-05-2021'), 'jenis_barang_id' => 2],
            ['barang_id' => 2, 'stok' => 81, 'jumlah_terjual' => 5, 'tanggal_transaksi' => Carbon::createFromFormat('d-m-Y', '12-05-2021'), 'jenis_barang_id' => 1],
        ]);
    }
}
