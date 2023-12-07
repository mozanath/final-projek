<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Edit Pengguna</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="user_username">Username:</label>
        <input type="text" name="user_username" value="{{ $user->user_username }}" required>

        <label for="user_password">Password:</label>
        <input type="password" name="user_password" value="{{ $user->user_password }}" required>

        <label for="user_fullname">Fullname:</label>
        <input type="text" name="user_fullname" value="{{ $user->user_fullname }}" required>

        <label for="user_email">Email:</label>
        <input type="email" name="user_email" value="{{ $user->user_email }}" required>

        <label for="user_nohp">No. HP:</label>
        <input type="text" name="user_nohp" value="{{ $user->user_nohp }}" required>

        <label for="user_alamat">Alamat:</label>
        <textarea name="user_alamat" required>{{ $user->user_alamat }}</textarea>

        <label for="user_profil">Profil:</label>
        <input type="text" name="user_profil" value="{{ $user->user_profil }}">

        <label for="user_level">Level:</label>
        <select name="user_level">
            <option value="Admin" {{ $user->user_level == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="Pengguna" {{ $user->user_level == 'Pengguna' ? 'selected' : '' }}>Pengguna</option>
        </select>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
