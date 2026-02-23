<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::latest()->get();
        return view('cms.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori'  => 'nullable|string|max:255',
            'link'      => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/materi'), $filename);
            $validated['gambar'] = 'img/materi/' . $filename;
        }

        Materi::create($validated);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = Materi::findOrFail($id);
        return view('cms.materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('cms.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori'  => 'nullable|string|max:255',
            'link'      => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($materi->gambar && file_exists(public_path($materi->gambar))) {
                unlink(public_path($materi->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/materi'), $filename);
            $validated['gambar'] = 'img/materi/' . $filename;
        }

        $materi->update($validated);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        if ($materi->gambar && file_exists(public_path($materi->gambar))) {
            unlink(public_path($materi->gambar));
        }   

        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
