<!-- resources/views/kategori_pakaian/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori Pakaian</h1>

    <form action="{{ route('kategori_pakaian.store') }}" method="POST">
        @csrf
        <label for="kategori_pakaian_nama">Nama Kategori:</label>
        <input type="text" name="kategori_pakaian_nama" id="kategori_pakaian_nama" required>
        <button type="submit">Tambah Kategori Pakaian</button>
    </form>
    
    <a href="{{ route('kategori_pakaian.index') }}">Kembali ke Daftar Kategori Pakaian</a>
@endsection
