<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metodePembayaran = MetodePembayaran::all();
        return view('metode_pembayaran.index', compact('metodePembayaran'));
    }

    public function create()
    {
        return view('metode_pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:DANA,OVO,BCA,COD',
            'nomor' => 'nullable',
        ]);
    
        $user_id = auth()->id(); // Dapatkan ID pengguna yang sedang masuk
        
        MetodePembayaran::create([
            'metode_pembayaran_user_id' => $user_id,
            'metode_pembayaran_jenis' => $request->jenis,
            'metode_pembayaran_nomor' => $request->nomor,
        ]);
    
        return redirect()->route('metode_pembayaran.index')->with('success', 'Metode Pembayaran berhasil ditambahkan');
    }
    
    public function show($id)
    {
        $metodePembayaran = MetodePembayaran::findOrFail($id);
        return view('metode_pembayaran.show', compact('metodePembayaran'));
    }

    public function edit($id)
    {
        $metodePembayaran = MetodePembayaran::findOrFail($id);
        return view('metode_pembayaran.edit', compact('metodePembayaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:DANA,OVO,BCA,COD',
            'nomor' => 'nullable',
        ]);

        $metodePembayaran = MetodePembayaran::findOrFail($id);
        $metodePembayaran->update([
            'metode_pembayaran_jenis' => $request->jenis,
            'metode_pembayaran_nomor' => $request->nomor,
        ]);

        return redirect()->route('metode_pembayaran.index')->with('success', 'Metode Pembayaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $metodePembayaran = MetodePembayaran::findOrFail($id);
        $metodePembayaran->delete();

        return redirect()->route('metode_pembayaran.index')->with('success', 'Metode Pembayaran berhasil dihapus');
    }
}
