<!-- resources/views/pembelian/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Pembelian</h1>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>User</th>
                <th>Metode Pembayaran</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelian as $pembelian)
                <tr>
                    <td>{{ $pembelian->tanggal }}</td>
                    <td>{{ $pembelian->user->user_fullname }}</td>
                    <td>{{ $pembelian->metodePembayaran->metode_pembayaran_jenis }}</td>
                    <td>{{ $pembelian->total_harga }}</td>
                    <td>
                        <a href="{{ route('pembelian.show', $pembelian->pembelian_id) }}">Detail</a>
                        <form action="{{ route('pembelian.destroy', $pembelian->pembelian_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('pembelian.create') }}">Tambah Pembelian</a>
@endsection
