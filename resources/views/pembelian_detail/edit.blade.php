<!-- resources/views/pembelian_detail/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Detail Pembelian</h1>

    <form action="{{ route('pembelian_detail.update', $pembelianDetail->pembelian_detail_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="pembelian_detail_pembelian_id">Pembelian ID:</label>
        <input type="number" name="pembelian_detail_pembelian_id" id="pembelian_detail_pembelian_id" value="{{ $pembelianDetail->pembelian_detail_pembelian_id }}" required>
        <br>
        <label for="pembelian_detail_pakaian_id">Pakaian ID:</label>
        <input type="number" name="pembelian_detail_pakaian_id" id="pembelian_detail_pakaian_id" value="{{ $pembelianDetail->pembelian_detail_pakaian_id }}" required>
        <br>
        <label for="pembelian_detail_jumlah">Jumlah:</label>
        <input type="number" name="pembelian_detail_jumlah" id="pembelian_detail_jumlah" value="{{ $pembelianDetail->pembelian_detail_jumlah }}" required>
        <br>
        <label for="pembelian_detail_total_harga">Total Harga:</label>
        <input type="number" name="pembelian_detail_total_harga" id="pembelian_detail_total_harga" value="{{ $pembelianDetail->pembelian_detail_total_harga }}" required>
        <br>
        <!-- tambahkan field lainnya sesuai kebutuhan -->
        <button type="submit">Simpan Perubahan</button>
    </form>
    
    <a href="{{ route('pembelian_detail.index') }}">Kembali ke Daftar Detail Pembelian</a>
@endsection
