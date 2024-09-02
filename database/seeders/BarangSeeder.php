<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('barang')->insert([
            ['nama_barang' => 'Kopi'],
            ['nama_barang' => 'Teh'],
            ['nama_barang' => 'Pasta Gigi'],
            ['nama_barang' => 'Sabun Mandi'],
            ['nama_barang' => 'Sampo'],
        ]);
    }
}
