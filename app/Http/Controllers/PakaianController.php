<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pakaian;
use App\Models\KategoriPakaian;

class PakaianController extends Controller
{
    public function index()
    {
        $pakaian = Pakaian::all();
        return view('pakaian.index', compact('pakaian'));
    }

    public function create()
    {
        $kategoriPakaian = KategoriPakaian::all();
        return view('pakaian.create', compact('kategoriPakaian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pakaian_kategori_pakaian_id' => 'required',
            'pakaian_nama' => 'required|unique:pakaian,pakaian_nama',
            'pakaian_harga' => 'required|numeric',
            'pakaian_stok' => 'required|numeric',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        Pakaian::create([
            'pakaian_kategori_pakaian_id' => $request->pakaian_kategori_pakaian_id,
            'pakaian_nama' => $request->pakaian_nama,
            'pakaian_harga' => $request->pakaian_harga,
            'pakaian_stok' => $request->pakaian_stok,
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        return redirect()->route('pakaian.index')->with('success', 'Pakaian berhasil ditambahkan');
    }

    public function show($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        return view('pakaian.show', compact('pakaian'));
    }

    public function edit($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $kategoriPakaian = KategoriPakaian::all();
        return view('pakaian.edit', compact('pakaian', 'kategoriPakaian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pakaian_kategori_pakaian_id' => 'required',
            'pakaian_nama' => 'required|unique:pakaian,pakaian_nama,' . $id,
            'pakaian_harga' => 'required|numeric',
            'pakaian_stok' => 'required|numeric',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $pakaian = Pakaian::findOrFail($id);
        $pakaian->update([
            'pakaian_kategori_pakaian_id' => $request->pakaian_kategori_pakaian_id,
            'pakaian_nama' => $request->pakaian_nama,
            'pakaian_harga' => $request->pakaian_harga,
            'pakaian_stok' => $request->pakaian_stok,
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        return redirect()->route('pakaian.index')->with('success', 'Pakaian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pakaian = Pakaian::findOrFail($id);
        $pakaian->delete();

        return redirect()->route('pakaian.index')->with('success', 'Pakaian berhasil dihapus');
    }
}
