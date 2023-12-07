<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_username' => 'required|max:50',
            'users_password' => 'required|max:50',
            'users_fullname' => 'required|max:100',
            'users_email' => 'required|email|unique:users,user_email',
            'users_nohp' => 'required|digits:13|unique:users,user_nohp',
            'users_alamat' => 'required|max:200',
            'users_profil' => 'nullable|max:255',
            'users_level' => 'required|in:Admin,Pengguna',
        ]);

        $request->merge(['users_username' => $request->user_username]);

        User::create($request->all());
    
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'users_username' => 'required|max:50',
            'users_password' => 'required|max:50',
            'users_fullname' => 'required|max:100',
            'users_email' => 'required|email|unique:users,users_email,' . $user->user_id . ',users_id',
            'users_nohp' => 'required|digits:13|unique:users,users_nohp,' . $user->user_id . ',users_id',
            'users_alamat' => 'required|max:200',
            'users_profil' => 'nullable|max:255',
            'users_level' => 'required|in:Admin,Pengguna',
        ]);

        // Jangan lupa hash password sebelum menyimpannya
        $request['users_password'] = bcrypt($request['users_password']);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
