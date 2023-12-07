<!-- resources/views/users/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Detail Pengguna</h2>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $user->user_id }}</td>
        </tr>
        <tr>
            <th>Username</th>
            <td>{{ $user->user_username }}</td>
        </tr>
        <tr>
            <th>Fullname</th>
            <td>{{ $user->user_fullname }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->user_email }}</td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td>{{ $user->user_nohp }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $user->user_alamat }}</td>
        </tr>
        <tr>
            <th>Profil</th>
            <td>{{ $user->user_profil }}</td>
        </tr>
        <tr>
            <th>Level</th>
            <td>{{ $user->user_level }}</td>
        </tr>
    </table>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
