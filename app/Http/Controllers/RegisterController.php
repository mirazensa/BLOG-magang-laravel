<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('blog.register')->with([
            'title' => 'registrasi'
        ]);
    }

    public function authenticate(Request $request)
    {
        $otentikasi = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'name.required' => 'Nama Harus Diisi..',
            'email.required' => 'Email Harus Diisi..',
            'email.email' => 'Masukkan Email Yang Valid..',
            'password.required' => 'Email Harus Diisi..',
        ]);

        $otentikasi['name'] = $request->name;
        $otentikasi['email'] = $request->email;
        $otentikasi['password'] = Hash::make($request->password);
        User::create($otentikasi);
        return redirect('/login')->with('Gagal', 'Email Atau Password Berhasil dibuat');
    }
}
