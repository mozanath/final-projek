<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\MetodePembayaran;
use App\Models\User;
use App\Models\Pakaian;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::with(['user', 'metodePembayaran', 'pembelianDetails'])->get();
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $users = User::all(); // Ambil semua pengguna
        $metodePembayaran = MetodePembayaran::all(); // Ambil semua metode pembayaran
        $pakaian = Pakaian::all(); // Ambil semua pakaian
        return view('pembelian.create', compact('users', 'metodePembayaran', 'pakaian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'metode_pembayaran_id' => 'required',
            'pembelian_details' => 'required|array',
            'pembelian_details.*.pakaian_id' => 'required|exists:pakaian,pakaian_id',
            'pembelian_details.*.jumlah' => 'required|integer|min:1',
        ]);

        $pembelian = Pembelian::create([
            'user_id' => $request->user_id,
            'metode_pembayaran_id' => $request->metode_pembayaran_id,
            'tanggal' => now(),
            'total_harga' => 0, // Tentukan cara menghitung total harga sesuai kebutuhan
        ]);

        $totalHarga = 0;

        foreach ($request->pembelian_details as $detail) {
            $pakaian = Pakaian::find($detail['pakaian_id']);

            $totalHarga += $pakaian->harga * $detail['jumlah'];

            PembelianDetail::create([
                'pembelian_id' => $pembelian->id,
                'pakaian_id' => $detail['pakaian_id'],
                'jumlah' => $detail['jumlah'],
                'total_harga' => $pakaian->harga * $detail['jumlah'],
            ]);

            // Update stok pakaian
            $pakaian->stok -= $detail['jumlah'];
            $pakaian->save();
        }

        // Update total harga di pembelian
        $pembelian->total_harga = $totalHarga;
        $pembelian->save();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan');
    }

    public function show($id)
    {
        $pembelian = Pembelian::with(['user', 'metodePembayaran', 'pembelianDetails'])->findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus');
    }
}
