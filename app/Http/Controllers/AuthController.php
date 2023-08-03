<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('blog.login', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // @dd($request);
        $otentikasi = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Email Harus Diisi..',
            'email.email' => 'Masukkan Email Yang Valid..',
            'password.required' => 'Email Harus Diisi..',
        ]);

        if (Auth::attempt($otentikasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('Gagal', 'Email Atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
