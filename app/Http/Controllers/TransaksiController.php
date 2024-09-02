<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::query();

        // Pencarian berdasarkan nama barang
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('barang', function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                ->orWhere('tanggal_transaksi', 'like', "%{$search}%");                
            });
        }

        // Pengurutan
        if ($request->filled('sort_by') && $request->filled('sort_order')) {
            $sortBy = $request->input('sort_by');
            $sortOrder = $request->input('sort_order');

            if ($sortBy == 'nama_barang') {
                $query->join('barang', 'transaksi.barang_id', '=', 'barang.id')
                      ->select('transaksi.*') // Pilih hanya kolom transaksi untuk menghindari duplikasi
                      ->orderBy('barang.nama_barang', $sortOrder);
            } else {
                $query->orderBy($sortBy, $sortOrder);
            }
        } else {
            $query->orderBy('tanggal_transaksi', 'desc'); // default sorting by tanggal_transaksi desc
        }

        $transaksis = $query->with('barang', 'jenisBarang')->get();

        return response()->json($transaksis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'stok' => 'required|integer',
            'jumlah_terjual' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
            'jenis_barang_id' => 'required|exists:jenis_barang,id',
        ]);

        $transaksi = new Transaksi();
        $transaksi->barang_id = $request->barang_id;
        $transaksi->stok = $request->stok;
        $transaksi->jumlah_terjual = $request->jumlah_terjual;
        $transaksi->tanggal_transaksi = Carbon::parse($request->tanggal_transaksi);
        $transaksi->jenis_barang_id = $request->jenis_barang_id;
        $transaksi->save();

        return $transaksi;
    }

    public function show($id)
    {
        return Transaksi::with(['barang', 'jenisBarang'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'stok' => 'required|integer',
            'jumlah_terjual' => 'required|integer',
            'tanggal_transaksi' => 'required|date',
            'jenis_barang_id' => 'required|exists:jenis_barang,id',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->barang_id = $request->barang_id;
        $transaksi->stok = $request->stok;
        $transaksi->jumlah_terjual = $request->jumlah_terjual;
        $transaksi->tanggal_transaksi = Carbon::parse($request->tanggal_transaksi);
        $transaksi->jenis_barang_id = $request->jenis_barang_id;
        $transaksi->save();

        return $transaksi;
    }

    public function destroy($id)
    {
        return Transaksi::destroy($id);
    }

    // Method untuk membandingkan jenis barang
    public function compareTransaksi(Request $request)
    {
        $sortBy = $request->input('sort_by', 'terbanyak'); // 'terbanyak' atau 'terendah'
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $query = DB::table('transaksi')
                ->select('transaksi.id', 'barang.nama_barang','jenis_barang.jenis_barang','transaksi.jumlah_terjual', 'transaksi.tanggal_transaksi')
                ->join('jenis_barang', 'jenis_barang.id', '=', 'transaksi.jenis_barang_id')
                ->join('barang', 'transaksi.barang_id', '=', 'barang.id')
                ->orderBy('transaksi.jumlah_terjual', $sortBy === 'terbanyak' ? 'desc' : 'asc');
            
            // Tambahkan filter rentang waktu jika start_date dan end_date ada
            if ($startDate && $endDate) {
                $query->whereBetween('transaksi.tanggal_transaksi', [$startDate, $endDate]);
            }

            $transaksi = $query->get();

            if ($transaksi->isEmpty()) {
                return response()->json(['message' => 'No data found'], 404);
            }

            return response()->json($transaksi);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving data'], 500);
        }
    }
}
