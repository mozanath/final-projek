<!-- resources/views/pembelian_detail/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Detail Pembelian</h1>

    <form action="{{ route('pembelian_detail.store') }}" method="POST">
        @csrf
        <label for="pembelian_detail_pembelian_id">Pembelian ID:</label>
        <input type="number" name="pembelian_detail_pembelian_id" id="pembelian_detail_pembelian_id" required>
        <br>
        <label for="pembelian_detail_pakaian_id">Pakaian ID:</label>
        <input type="number" name="pembelian_detail_pakaian_id" id="pembelian_detail_pakaian_id" required>
        <br>
        <label for="pembelian_detail_jumlah">Jumlah:</label>
        <input type="number" name="pembelian_detail_jumlah" id="pembelian_detail_jumlah" required>
        <br>
        <label for="pembelian_detail_total_harga">Total Harga:</label>
        <input type="number" name="pembelian_detail_total_harga" id="pembelian_detail_total_harga" required>
        <br>
        <!-- tambahkan field lainnya sesuai kebutuhan -->
        <button type="submit">Tambah Detail Pembelian</button>
    </form>
    
    <a href="{{ route('pembelian_detail.index') }}">Kembali ke Daftar Detail Pembelian</a>
@endsection
