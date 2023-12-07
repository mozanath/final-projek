<!-- resources/views/kategori_pakaian/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori Pakaian</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoriPakaian as $kategori)
                <tr>
                    <td>{{ $kategori->kategori_pakaian_nama }}</td>
                    <td>
                        <a href="{{ route('kategori_pakaian.show', $kategori->kategori_pakaian_id) }}">Detail</a>
                        <a href="{{ route('kategori_pakaian.edit', $kategori->kategori_pakaian_id) }}">Edit</a>
                        <form action="{{ route('kategori_pakaian.destroy', $kategori->kategori_pakaian_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('kategori_pakaian.create') }}">Tambah Kategori Pakaian</a>
@endsection
