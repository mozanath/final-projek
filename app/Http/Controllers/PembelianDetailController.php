<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use App\Models\Pakaian;

class PembelianDetailController extends Controller
{
    public function index()
    {
        $pembelianDetails = PembelianDetail::all();
        return view('pembelian_detail.index', compact('pembelianDetails'));
    }

    public function create()
    {
        $pakaian = Pakaian::all();
        return view('pembelian_detail.create', compact('pakaian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembelian_detail_pembelian_id' => 'required',
            'pembelian_detail_pakaian_id' => 'required',
            'pembelian_detail_jumlah' => 'required|numeric',
            'pembelian_detail_total_harga' => 'required|numeric',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        PembelianDetail::create([
            'pembelian_detail_pembelian_id' => $request->pembelian_detail_pembelian_id,
            'pembelian_detail_pakaian_id' => $request->pembelian_detail_pakaian_id,
            'pembelian_detail_jumlah' => $request->pembelian_detail_jumlah,
            'pembelian_detail_total_harga' => $request->pembelian_detail_total_harga,
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        return redirect()->route('pembelian_detail.index')->with('success', 'Detail Pembelian berhasil ditambahkan');
    }

    public function show($id)
    {
        $pembelianDetail = PembelianDetail::findOrFail($id);
        return view('pembelian_detail.show', compact('pembelianDetail'));
    }

    public function edit($id)
    {
        $pembelianDetail = PembelianDetail::findOrFail($id);
        $pakaian = Pakaian::all();
        return view('pembelian_detail.edit', compact('pembelianDetail', 'pakaian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pembelian_detail_pembelian_id' => 'required',
            'pembelian_detail_pakaian_id' => 'required',
            'pembelian_detail_jumlah' => 'required|numeric',
            'pembelian_detail_total_harga' => 'required|numeric',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $pembelianDetail = PembelianDetail::findOrFail($id);
        $pembelianDetail->update([
            'pembelian_detail_pembelian_id' => $request->pembelian_detail_pembelian_id,
            'pembelian_detail_pakaian_id' => $request->pembelian_detail_pakaian_id,
            'pembelian_detail_jumlah' => $request->pembelian_detail_jumlah,
            'pembelian_detail_total_harga' => $request->pembelian_detail_total_harga,
            // tambahkan field lainnya sesuai kebutuhan
        ]);

        return redirect()->route('pembelian_detail.index')->with('success', 'Detail Pembelian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pembelianDetail = PembelianDetail::findOrFail($id);
        $pembelianDetail->delete();

        return redirect()->route('pembelian_detail.index')->with('success', 'Detail Pembelian berhasil dihapus');
    }
}
