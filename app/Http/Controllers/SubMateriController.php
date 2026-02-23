<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\SubMateri;
use Illuminate\Http\Request;

class SubMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$materi_id)
    {
        $query = SubMateri::with('materi');

        if ($materi_id) {
            $query->where('materi_id', $materi_id);
        }

        $subMateri = $query->latest()->get();
        return view('cms.sub_materi.index', compact('subMateri','materi_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,$materi_id)
    {
        $materiId = $materi_id;
        $materis = Materi::where('id', $materiId)->get();
        return view('cms.sub_materi.create', compact('materis', 'materi_id','materiId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$materi_id)
    {
        $validated = $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga'     => 'required|integer|min:0',
            'link'      => 'nullable|string',
        ]);
        $validated['materi_id'] = $materi_id;


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/sub-materi'), $filename);
            $validated['gambar'] = 'img/sub-materi/' . $filename;
        }

        SubMateri::create($validated);

        return redirect()->route('sub-materi.index', ['materi_id' => $request->materi_id])
            ->with('success', 'Sub Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subMateri = SubMateri::with('materi')->findOrFail($id);
        return view('cms.sub_materi.show', compact('subMateri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subMateri = SubMateri::findOrFail($id);
        $materis = Materi::where('id', $subMateri->materi_id)->get();
        return view('cms.sub_materi.edit', compact('subMateri', 'materis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subMateri = SubMateri::findOrFail($id);

        $validated = $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga'     => 'required|integer|min:0',
            'link'      => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($subMateri->gambar && file_exists(public_path($subMateri->gambar))) {
                unlink(public_path($subMateri->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/sub-materi'), $filename);
            $validated['gambar'] = 'img/sub-materi/' . $filename;
        }

        $subMateri->update($validated);

        return redirect()->route('sub-materi.index', ['materi_id' => $subMateri->materi_id])
            ->with('success', 'Sub Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subMateri = SubMateri::findOrFail($id);

        if ($subMateri->gambar && file_exists(public_path($subMateri->gambar))) {
            unlink(public_path($subMateri->gambar));
        }

        $subMateri->delete();

        return redirect()->back()->with('success', 'Sub Materi berhasil dihapus.');
    }
}
