<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.artikel.index')->with([
            'title' => 'artikel',
            'articles' => Article::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/dashboard/artikel/artikel-baru')->with([
            'categories' => Category::all(),
            'title' => 'Artikel'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'max:255'],
            'slug'  => ['required', 'unique:articles'],
            'gambar' => ['image', 'file', 'max:1024'],
            'category_id' => ['required'],
            'tag' => ['required'],
            'isi' => ['required'],
        ], [
            'judul.required'        => 'judul artikel tidak boleh kosong',
            'judul.max'             => 'judul artikel max 255 karakter',
            'slug.required'         => 'slug artikel tidak boleh kosong',
            'slug.unque'            => 'slug sudah ada',
            'gambar.image'          => 'file yang anda upload bukan gambar',
            'gambar.max'            => 'maksimal ukuran gambar 1MB',
            'category_id.required'  => 'Kategori harus dipilih',
            'tag.required'          => 'tag artikel harus diisi',
            'isi.required'          => 'isi artikel tidak boleh kosong',
        ]);

        // jika ada gambar yang diupload
        if ($request->file('gambar')) {
            $namaGambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('images'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        // validasi user yang login
        $validasi['user_id'] = auth()->user()->id;
        $validasi['kutipan'] = Str::limit(strip_tags($request->isi), 200, '...');

        // insert ke artikel
        $artikel = Article::create($validasi);

        // insert ke tags
        $tags = explode(',', $request->tag);
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['nama' => trim($tagName)]);
            $artikel->tags()->attach($tag);
        }

        return back()->with('info', 'artikel baru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Article::where('id', $id)->first();
        return view('dashboard.artikel.artikel-edit')->with([
            'categories'    => Category::all(),
            'data'          => $artikel,
            'tags'          => $artikel->tags()->implode('nama', ','),
            'title'         => 'edit artikel'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Article::where('id', $id)->first();

        $validasi = [
            'judul' => ['required', 'max:255'],
            'gambar' => ['image', 'file', 'max:1024'],
            'category_id' => ['required'],
            'tag' => ['required'],
            'isi' => ['required'],
        ];

        if ($request->slug != $artikel->slug) {
            $validasi['slug'] = ['required', 'unique:articles'];
        }

        $dataValidasi = $request->validate($validasi, [
            'judul.required'        => 'judul artikel tidak boleh kosong',
            'judul.max'             => 'judul artikel max 255 karakter',
            'slug.required'         => 'slug artikel tidak boleh kosong',
            'slug.unque'            => 'slug sudah ada',
            'gambar.image'          => 'file yang anda upload bukan gambar',
            'gambar.max'            => 'maksimal ukuran gambar 1MB',
            'category_id.required'  => 'Kategori harus dipilih',
            'tag.required'          => 'tag artikel harus diisi',
            'isi.required'          => 'isi artikel tidak boleh kosong',
        ]);

        if ($request->file('gambar')) {
            if ($request->gambarLama) {
                File::delete(public_path('images/' . $request->gambarLama));
            }
            $namaGambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('images'), $namaGambar);
            $dataValidasi['gambar'] = $namaGambar;
        }

        $dataValidasi['user_id'] = auth()->user()->id;
        $dataValidasi['kutipan'] = Str::limit(strip_tags($request->isi), 200);

        $artikel->update($dataValidasi);

        $tags = explode(',', $request->tag);
        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['nama' => trim($tagName)]);
            array_push($newTags, $tag->id);
        }
        $artikel->tags()->sync($newTags);

        return redirect('/dashboard/artikel')->with('info', 'artikel telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Article::where('id', $id)->first();
        if ($artikel->gambar) {
            File::delete(public_path('images') . '/' . $artikel->gambar);
        }

        $artikel->tags()->detach();

        Article::where('id', $id)->delete();

        return back()->with('info', 'artikel data berhasil dihapus');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
