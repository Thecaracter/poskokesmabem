<?php

namespace App\Http\Controllers;

use App\Models\StrukturPengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = StrukturPengurus::all();
        return view('admin.pengurus', compact('pengurus'));
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
            'nama' => 'required',
            'jabatan' => 'required',
            'asal' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $strukturPengurus = new StrukturPengurus();
        $strukturPengurus->nama = $request->nama;
        $strukturPengurus->jabatan = $request->jabatan;
        $strukturPengurus->asal = $request->asal;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads'), $fotoName);
            $strukturPengurus->foto = $fotoName;
        }

        $strukturPengurus->save();

        return redirect()->route('pengurus.index')
            ->with('success', 'Struktur pengurus berhasil ditambahkan.');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'asal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $strukturPengurus = StrukturPengurus::findOrFail($id);
        $strukturPengurus->nama = $request->nama;
        $strukturPengurus->jabatan = $request->jabatan;
        $strukturPengurus->asal = $request->asal;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($strukturPengurus->foto) {
                File::delete(public_path('uploads/' . $strukturPengurus->foto));
            }

            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads'), $fotoName);
            $strukturPengurus->foto = $fotoName;
        }

        $strukturPengurus->save();

        return redirect()->route('pengurus.index')
            ->with('success', 'Struktur pengurus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $strukturPengurus = StrukturPengurus::findOrFail($id);

        // Hapus foto jika ada
        if ($strukturPengurus->foto) {
            File::delete(public_path('uploads/' . $strukturPengurus->foto));
        }

        $strukturPengurus->delete();

        return redirect()->route('pengurus.index')
            ->with('success', 'Struktur pengurus berhasil dihapus.');
    }
}