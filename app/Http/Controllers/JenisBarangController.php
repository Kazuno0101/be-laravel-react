<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function index()
    {
        return JenisBarang::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang' => 'required|unique:jenis_barang',
        ]);

        return JenisBarang::create($request->all());
    }

    public function show($id)
    {
        return JenisBarang::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $jenisBarang = JenisBarang::findOrFail($id);
        $request->validate([
            'jenis_barang' => 'required|unique:jenis_barang,jenis_barang,' . $id,
        ]);

        $jenisBarang->update($request->all());
        return $jenisBarang;
    }

    public function destroy($id)
    {
        return JenisBarang::destroy($id);
    }
}
