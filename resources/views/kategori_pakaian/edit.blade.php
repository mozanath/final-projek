<!-- resources/views/kategori_pakaian/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Kategori Pakaian</h1>

    <form action="{{ route('kategori_pakaian.update', $kategoriPakaian->kategori_pakaian_id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="kategori_pakaian_nama">Nama Kategori:</label>
        <input type="text" name="kategori_pakaian_nama" id="kategori_pakaian_nama" value="{{ $kategoriPakaian->kategori_pakaian_nama }}" required>
        <button type="submit">Simpan Perubahan</button>
    </form>
    
    <a href="{{ route('kategori_pakaian.index') }}">Kembali ke Daftar Kategori Pakaian</a>
@endsection
