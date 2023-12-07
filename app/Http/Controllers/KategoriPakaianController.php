<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPakaian;

class KategoriPakaianController extends Controller
{
    public function index()
    {
        $kategoriPakaian = KategoriPakaian::all();
        return view('kategori_pakaian.index', compact('kategoriPakaian'));
    }

    public function create()
    {
        return view('kategori_pakaian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_pakaian_nama' => 'required|unique:kategori_pakaian,kategori_pakaian_nama',
        ]);

        KategoriPakaian::create([
            'kategori_pakaian_nama' => $request->kategori_pakaian_nama,
        ]);

        return redirect()->route('kategori_pakaian.index')->with('success', 'Kategori Pakaian berhasil ditambahkan');
    }

    public function show($id)
    {
        $kategoriPakaian = KategoriPakaian::findOrFail($id);
        return view('kategori_pakaian.show', compact('kategoriPakaian'));
    }

    public function edit($id)
    {
        $kategoriPakaian = KategoriPakaian::findOrFail($id);
        return view('kategori_pakaian.edit', compact('kategoriPakaian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_pakaian_nama' => 'required|unique:kategori_pakaian,kategori_pakaian_nama,' . $id,
        ]);

        $kategoriPakaian = KategoriPakaian::findOrFail($id);
        $kategoriPakaian->update([
            'kategori_pakaian_nama' => $request->kategori_pakaian_nama,
        ]);

        return redirect()->route('kategori_pakaian.index')->with('success', 'Kategori Pakaian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kategoriPakaian = KategoriPakaian::findOrFail($id);
        $kategoriPakaian->delete();

        return redirect()->route('kategori_pakaian.index')->with('success', 'Kategori Pakaian berhasil dihapus');
    }
}
