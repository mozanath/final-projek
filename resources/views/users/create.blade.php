

@extends('layouts.app')

@section('content')
    <h2>Tambah Pengguna Baru</h2>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="user_username">Username:</label>
        <input type="text" name="user_username" value="{{ old('user_username') }}" required>

        <label for="user_password">Password:</label>
        <input type="password" name="user_password" value="{{ old('user_password') }}" required>

        <label for="user_fullname">Fullname:</label>
        <input type="text" name="user_fullname" value="{{ old('user_fullname') }}" required>

        <label for="user_email">Email:</label>
        <input type="email" name="user_email" value="{{ old('user_email') }}" required>

        <label for="user_nohp">No. HP:</label>
        <input type="text" name="user_nohp" value="{{ old('user_nohp') }}" required>

        <label for="user_alamat">Alamat:</label>
        <textarea name="user_alamat" required>{{ old('user_alamat') }}</textarea>

        <label for="user_profil">Profil:</label>
        <input type="text" name="user_profil" value="{{ old('user_profil') }}">

        <label for="user_level">Level:</label>
        <select name="user_level">
            <option value="Admin">Admin</option>
            <option value="Pengguna">Pengguna</option>
        </select>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
