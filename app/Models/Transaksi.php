<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['barang_id', 'jumlah', 'total_harga'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // Definisikan relasi ke JenisBarang
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }
}
