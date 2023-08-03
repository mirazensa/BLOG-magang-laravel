<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index()
    {

        $lang_url = public_path('admin/devicon.json');
        $lang_data = file_get_contents($lang_url);
        $lang_data = json_decode($lang_data, true);
        $lang       = array_column($lang_data, 'name');
        $lang       = '"' . implode('","', $lang) . '"';

        return view('dashboard.index')->with([
            'title' => 'about',
            'source' => $lang
        ]);
    }

    public function update(Request $request)
    {
        $validasi = $request->validate([
            'foto'  => ['image', 'file', 'max:1024'],
            'name'  => ['required'],
            'email' =>  ['required', 'email'],
            'telepon' => ['required', 'numeric'],
            'alamat'    => ['required'],
            'keahlian' => ['required'],
            'words'     => ['required']
        ], [
            'foto.image' => 'file yang diupload bukan gambar',
            'foto.max'  => 'maksimal 1mb',
            'name.required' => 'nama harus ada',
            'email.required' => 'email harus ada',
            'email.email' => 'email yang valid dong',
            'telepon.required' => 'telepon harus ada',
            'telepon.numeric' => 'inputan harus berupa angka',
            'alamat.required' => 'alamat harus ada',
            'keahlian.required' => 'keahlian harus ada',
            'words.required' => 'words harus ada',
        ]);

        if ($request->file('foto')) {
            if ($request->fotoLama) {
                File::delete(public_path('images/') . $request->fotoLama);
            }
            $namaFoto = $request->file('foto')->hashName();
            $request->file('foto')->move(public_path('images/'), $namaFoto);
            $validasi['foto'] = $namaFoto;
        }

        User::where('id', auth()->user()->id)->update($validasi);
        return back()->with('info', 'profile penulis berhasil diperbarui');
    }

    public function about(Article $article, User $user)
    {
        return view('blog.tentang')->with([
            'title' => 'tentang',
            'categories' => Category::all(),
            'users'     => User::where('id', 1)->get(),
            'views'     => Article::orderBy('view', 'desc')->take(5)->get(),
            'label'     => 'artikel populer'

        ]);
    }
}
