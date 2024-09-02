<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['nama_barang', 'jenis_barang_id', 'harga', 'stok'];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}
