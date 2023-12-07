<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Users</h1>
    
    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Profil</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->user_username }}</td>
                    <td>{{ $user->user_fullname }}</td>
                    <td>{{ $user->user_email }}</td>
                    <td>{{ $user->user_nohp }}</td>
                    <td>{{ $user->user_alamat }}</td>
                    <td>{{ $user->user_profil }}</td>
                    <td>{{ $user->user_level }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
