<!-- resources/views/pakaian/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Pakaian</h1>

    <p>Kategori: {{ $pakaian->kategoriPakaian->kategori_pakaian_nama }}</p>
    <p>Nama: {{ $pakaian->pakaian_nama }}</p>
    <p>Harga: {{ $pakaian->pakaian_harga }}</p>
    <p>Stok: {{ $pakaian->pakaian_stok }}</p>
    <!-- tambahkan field lainnya sesuai kebutuhan -->

    <a href="{{ route('pakaian.index') }}">Kembali ke Daftar Pakaian</a>
@endsection
