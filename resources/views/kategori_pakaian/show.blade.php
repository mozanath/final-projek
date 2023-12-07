<!-- resources/views/kategori_pakaian/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Kategori Pakaian</h1>

    <p>Nama: {{ $kategoriPakaian->kategori_pakaian_nama }}</p>

    <a href="{{ route('kategori_pakaian.index') }}">Kembali ke Daftar Kategori Pakaian</a>
@endsection
