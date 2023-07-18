<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return request()->all();
    }
}
