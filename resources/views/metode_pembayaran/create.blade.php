
@extends('layouts.app')

@section('content')
    <h1>Tambah Metode Pembayaran</h1>

    <form action="{{ route('metode_pembayaran.store') }}" method="POST">
        @csrf
        <label for="jenis">Jenis Pembayaran:</label>
        <select name="jenis" id="jenis">
            <option value="DANA">DANA</option>
            <option value="OVO">OVO</option>
            <option value="BCA">BCA</option>
            <option value="COD">COD</option>
        </select>

        <label for="nomor">Nomor Pembayaran:</label>
        <input type="text" name="nomor">

        <button type="submit">Tambah Metode Pembayaran</button>
    </form>
    
    <a href="{{ route('metode_pembayaran.index') }}">Kembali ke Daftar Metode Pembayaran</a>
@endsection
