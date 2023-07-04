<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitra = Mitra::all();
        return view('admin.mitra', compact('mitra'));
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
            'nama_mitra' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('imagesmitra'), $imageName);

        Mitra::create([
            'nama_mitra' => $request->nama_mitra,
            'foto' => $imageName,
        ]);

        return redirect()->route('mitra.index')->with('success', 'Beasiswa created successfully.');
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
            'nama_mitra' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mitra = Mitra::findOrFail($id);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();

            // Menghapus gambar lama jika ada
            if ($mitra->foto) {
                $imagePath = public_path('imagesmitra/' . $mitra->foto);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $mitra->foto->move(public_path('imagesmitra'), $imageName);
            $mitra->foto = $imageName;
        }

        $mitra->nama_beasiswa = $request->nama_beasiswa;
        $mitra->save();

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);

        // Menghapus file terkait jika ada
        $fotoPath = public_path('imagesmitra/' . $mitra->foto);
        if (File::exists($fotoPath)) {
            File::delete($fotoPath);
        }

        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully.');
    }
}