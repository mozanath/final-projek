

@extends('layouts.app')

@section('content')
    <h1>Daftar Metode Pembayaran</h1>

    <table>
        <thead>
            <tr>
                <th>Jenis Pembayaran</th>
                <th>Nomor Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metodePembayaran as $metode)
                <tr>
                    <td>{{ $metode->metode_pembayaran_jenis }}</td>
                    <td>{{ $metode->metode_pembayaran_nomor }}</td>
                    <td>
                        <a href="{{ route('metode_pembayaran.show', $metode->metode_pembayaran_id) }}">Detail</a>
                        <a href="{{ route('metode_pembayaran.edit', $metode->metode_pembayaran_id) }}">Edit</a>
                        <form action="{{ route('metode_pembayaran.destroy', $metode->metode_pembayaran_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('metode_pembayaran.create') }}">Tambah Metode Pembayaran</a>
@endsection
