<?php

namespace App\Http\Controllers;

use App\Models\LayananAdvokasi;
use Illuminate\Http\Request;

class LayananAdvokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananAdvokasi = LayananAdvokasi::with('angkatan', 'jurusan', 'prodi', 'layanan')->get();
        return view('admin.advokasi', compact('layananAdvokasi'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}