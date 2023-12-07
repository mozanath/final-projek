<!-- resources/views/pembelian_detail/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Detail Pembelian</h1>

    <table>
        <thead>
            <tr>
                <th>Pembelian ID</th>
                <th>Pakaian ID</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelianDetails as $item)
                <tr>
                    <td>{{ $item->pembelian_detail_pembelian_id }}</td>
                    <td>{{ $item->pembelian_detail_pakaian_id }}</td>
                    <td>{{ $item->pembelian_detail_jumlah }}</td>
                    <td>{{ $item->pembelian_detail_total_harga }}</td>
                    <td>
                        <a href="{{ route('pembelian_detail.show', $item->pembelian_detail_id) }}">Detail</a>
                        <a href="{{ route('pembelian_detail.edit', $item->pembelian_detail_id) }}">Edit</a>
                        <form action="{{ route('pembelian_detail.destroy', $item->pembelian_detail_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('pembelian_detail.create') }}">Tambah Detail Pembelian</a>
@endsection
