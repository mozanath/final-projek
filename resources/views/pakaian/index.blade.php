<!-- resources/views/pakaian/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Pakaian</h1>

    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakaian as $item)
                <tr>
                    <td>{{ $item->kategoriPakaian->kategori_pakaian_nama }}</td>
                    <td>{{ $item->pakaian_nama }}</td>
                    <td>{{ $item->pakaian_harga }}</td>
                    <td>{{ $item->pakaian_stok }}</td>
                    <td>
                        <a href="{{ route('pakaian.show', $item->pakaian_id) }}">Detail</a>
                        <a href="{{ route('pakaian.edit', $item->pakaian_id) }}">Edit</a>
                        <form action="{{ route('pakaian.destroy', $item->pakaian_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('pakaian.create') }}">Tambah Pakaian</a>
@endsection
