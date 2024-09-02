<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return Barang::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang',
        ]);

        return Barang::create($request->all());
    }

    public function show($id)
    {
        return Barang::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $request->validate([
            'nama_barang' => 'required|unique:barang,nama_barang,' . $id,
        ]);

        $barang->update($request->all());
        return $barang;
    }

    public function destroy($id)
    {
        return Barang::destroy($id);
    }
}
