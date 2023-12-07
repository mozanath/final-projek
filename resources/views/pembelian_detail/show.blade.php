<!-- resources/views/pembelian_detail/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Detail Pembelian</h1>

    <p>Pembelian ID: {{ $pembelianDetail->pembelian_detail_pembelian_id }}</p>
    <p>Pakaian ID: {{ $pembelianDetail->pembelian_detail_pakaian_id }}</p>
    <p>Jumlah: {{ $pembelianDetail->pembelian_detail_jumlah }}</p>
    <p>Total Harga: {{ $pembelianDetail->pembelian_detail_total_harga }}</p>
    <!-- tambahkan field lainnya sesuai kebutuhan -->

    <a href="{{ route('pembelian_detail.index') }}">Kembali ke Daftar Detail Pembelian</a>
@endsection
