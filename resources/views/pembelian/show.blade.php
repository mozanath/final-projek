<!-- resources/views/pembelian/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Pembelian</h1>

    <p>Tanggal: {{ $pembelian->tanggal }}</p>
    <p>User: {{ $pembelian->user->user_fullname }}</p>
    <p>Metode Pembayaran: {{ $pembelian->metodePembayaran->metode_pembayaran_jenis }}</p>
    <p>Total Harga: {{ $pembelian->total_harga }}</p>

    <!-- Tampilkan pembelian details sesuai kebutuhan -->

    <a href="{{ route('pembelian.index') }}">Kembali ke Daftar Pembelian</a>
@endsection
