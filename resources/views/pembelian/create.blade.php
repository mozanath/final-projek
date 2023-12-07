<!-- resources/views/pembelian/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Pembelian</h1>

    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->user_id }}">{{ $user->user_fullname }}</option>
            @endforeach
        </select>

        <label for="metode_pembayaran_id">Metode Pembayaran:</label>
        <select name="metode_pembayaran_id" id="metode_pembayaran_id">
            @foreach($metodePembayaran as $metode)
                <option value="{{ $metode->metode_pembayaran_id }}">{{ $metode->metode_pembayaran_jenis }}</option>
            @endforeach
        </select>

        <!-- Tambahkan input atau tampilan sesuai kebutuhan untuk pembelian details -->

        <button type="submit">Tambah Pembelian</button>
    </form>
    
    <a href="{{ route('pembelian.index') }}">Kembali ke Daftar Pembelian</a>
@endsection
