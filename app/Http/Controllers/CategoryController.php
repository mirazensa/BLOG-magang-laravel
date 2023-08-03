<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.kategori.index')->with([
            'title' => 'kategori',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.kategori-baru')->with([
            'title' => 'tambah kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => ['required'],
            'slug' => ['required', 'unique:categories'],
            'deskripsi' => ['max:255']
        ], [
            'nama.required' => 'nama kategori harus diisi',
            'slug.required' => 'slug kategori tidak boleh kosong',
            'slug.unique' => 'slug sudah ada',
            'deskripsi.max' => 'maksimal 255 karater'
        ]);

        Category::create($validasi);
        return back()->with('info', 'kategori baru berhasil dibuat');
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
        return view('dashboard.kategori.kategori-edit')->with([
            'title' => 'kategori',
            'data' => Category::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Category::where('id', $id)->first();

        if ($request->nama != $data->nama) {
            $validasi['nama'] = ['required'];
            $validasi['slug'] = ['required', 'unique:categories'];
        }

        $validasi['deskripsi'] = ['max:255'];
        $dataValidasi = $request->validate($validasi, [
            'nama.required' => 'nama kategori harus diisi',
            'slug.required' => 'slug kategori tidak boleh kosong',
            'slug.unique' => 'slug sudah ada',
            'deskripsi.max' => 'maksimal 255 karater'
        ]);

        Category::where('id', $id)->update($dataValidasi);
        return redirect('/dashboard/kategori')->with('info', 'kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return back()->with('info', 'kategori berhasil dihapus');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->kategori);
        return response()->json(['slug' => $slug]);
    }
}
