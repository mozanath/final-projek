

@extends('layouts.app')

@section('content')
    <h1>Detail Metode Pembayaran</h1>

    <p>Jenis Pembayaran: {{ $metodePembayaran->metode_pembayaran_jenis }}</p>
    <p>Nomor Pembayaran: {{ $metodePembayaran->metode_pembayaran_nomor }}</p>

    <a href="{{ route('metode_pembayaran.index') }}">Kembali ke Daftar Metode Pembayaran</a>
@endsection
