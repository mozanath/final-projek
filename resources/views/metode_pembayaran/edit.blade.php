

@extends('layouts.app')

@section('content')
    <h1>Edit Metode Pembayaran</h1>

    <form action="{{ route('metode_pembayaran.update', $metodePembayaran->metode_pembayaran_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="jenis">Jenis Pembayaran:</label>
        <select name="jenis" id="jenis">
            <option value="DANA" {{ $metodePembayaran->metode_pembayaran_jenis == 'DANA' ? 'selected' : '' }}>DANA</option>
            <option value="OVO" {{ $metodePembayaran->metode_pembayaran_jenis == 'OVO' ? 'selected' : '' }}>OVO</option>
            <option value="BCA" {{ $metodePembayaran->metode_pembayaran_jenis == 'BCA' ? 'selected' : '' }}>BCA</option>
            <option value="COD" {{ $metodePembayaran->metode_pembayaran_jenis == 'COD' ? 'selected' : '' }}>COD</option>
        </select>

        <label for="nomor">Nomor Pembayaran:</label>
        <input type="text" name="nomor" value="{{ $metodePembayaran->metode_pembayaran_nomor }}">

        <button type="submit">Simpan Perubahan</button>
    </form>
    
    <a href="{{ route('metode_pembayaran.index') }}">Kembali ke Daftar Metode Pembayaran</a>
@endsection
