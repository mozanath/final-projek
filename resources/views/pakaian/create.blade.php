<!-- resources/views/pakaian/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Pakaian</h1>

    <form action="{{ route('pakaian.store') }}" method="POST">
        @csrf
        <label for="pakaian_kategori_pakaian_id">Kategori:</label>
        <select name="pakaian_kategori_pakaian_id" id="pakaian_kategori_pakaian_id" required>
            @foreach($kategoriPakaian as $kategori)
                <option value="{{ $kategori->kategori_pakaian_id }}">{{ $kategori->kategori_pakaian_nama }}</option>
            @endforeach
        </select>
        <br>
        <label for="pakaian_nama">Nama Pakaian:</label>
        <input type="text" name="pakaian_nama" id="pakaian_nama" required>
        <br>
        <label for="pakaian_harga">Harga:</label>
        <input type="number" name="pakaian_harga" id="pakaian_harga" required>
        <br>
        <label for="pakaian_stok">Stok:</label>
        <input type="number" name="pakaian_stok" id="pakaian_stok" required>
        <br>
        <!-- tambahkan field lainnya sesuai kebutuhan -->
        <button type="submit">Tambah Pakaian</button>
    </form>
    
    <a href="{{ route('pakaian.index') }}">Kembali ke Daftar Pakaian</a>
@endsection
