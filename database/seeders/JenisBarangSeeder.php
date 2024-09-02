<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_barang')->insert([
            ['jenis_barang' => 'Konsumsi'],
            ['jenis_barang' => 'Pembersih'],
        ]);
    }
}
