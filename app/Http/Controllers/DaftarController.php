<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DaftarController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Daftar',
            'active' => 'daftar',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        // flash (popup di laravel)
        // $request->session()->flash('sukses', 'Regstrasi berhasil! Silahkan Login.');

        return redirect('/login')->with('sukses', 'Regstrasi berhasil! Silahkan Login.');
    }
}
