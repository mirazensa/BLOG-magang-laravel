<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.slide.index')->with([
            'slides' => Slide::all(),
            'title' => 'slide'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.slide.slide-baru')->with([
            'title' => 'Slide'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'max:50'],
            'gambar' => ['image', 'file', 'max:1024'],
            'kutipan' => ['required', 'max:255'],
        ], [
            'judul.required' => 'headline harus diisi',
            'judul.max' => 'maksimal 50 char',
            'gambar.image' => 'file yang anda upload bukan gambar',
            'gambar.max' => 'gambar maksimal 1mb',
            'kutipan.required' => 'Kutipan harus diisi',
            'kutipan.max' => 'maksimal harus 255 karakter',
        ]);
        if ($request->file('gambar')) {
            $namaGambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('images'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        Slide::create($validasi);
        return back()->with('info', 'Slide baru berhasil ditambahkan');
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
        $slideEdit = Slide::where('id', $id)->first();
        return view('dashboard.slide.slide-edit')->with([
            'title' => 'slide',
            'data' => $slideEdit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'judul' => ['required', 'max:50'],
            'gambar' => ['image', 'file', 'max:1024'],
            'kutipan' => ['required', 'max:255'],
        ], [
            'judul.required' => 'headline harus diisi',
            'judul.max' => 'maksimal 50 char',
            'gambar.image' => 'file yang anda upload bukan gambar',
            'gambar.max' => 'gambar maksimal 1mb',
            'kutipan.required' => 'Kutipan harus diisi',
            'kutipan.max' => 'maksimal harus 255 karakter',
        ]);

        // cek gambar
        if ($request->file('gambar')) {
            if ($request->gambarLama) {
                File::delete(public_path('images/' . $request->gambarLama));
            }
            $namaGambar = $request->file('gambar')->hashName();
            $request->file('gambar')->move(public_path('images'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        Slide::where('id', $id)->update($validasi);
        return redirect('/dashboard/slide')->with('info', 'Slide berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Slide::where('id', $id)->first();

        if ($data->gambar) {
            File::delete(public_path('images') . '/' . $data->gambar);
        }

        Slide::where('id', $id)->delete();
        return back()->with('info', 'slide berhasil dihapus');
    }
}
