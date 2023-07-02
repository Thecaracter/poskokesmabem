<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beasiswa = Beasiswa::all();
        return view('admin.beasiswa', compact('beasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);

        Beasiswa::create([
            'nama_beasiswa' => $request->nama_beasiswa,
            'foto' => $imageName,
        ]);

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_beasiswa' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beasiswa = Beasiswa::findOrFail($id);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();

            // Menghapus gambar lama jika ada
            if ($beasiswa->foto) {
                $imagePath = public_path('images/' . $beasiswa->foto);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $request->foto->move(public_path('images'), $imageName);
            $beasiswa->foto = $imageName;
        }

        $beasiswa->nama_beasiswa = $request->nama_beasiswa;
        $beasiswa->save();

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        // Menghapus file terkait jika ada
        $fotoPath = public_path('images/' . $beasiswa->foto);
        if (File::exists($fotoPath)) {
            File::delete($fotoPath);
        }

        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Beasiswa deleted successfully.');
    }
}