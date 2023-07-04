<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\LayananAdvokasi;
use App\Models\Mitra;
use App\Models\StrukturPengurus;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beasiswas = Beasiswa::all();
        $mitra = Mitra::all();
        $beasiswaCount = Beasiswa::count();
        $layananCount = LayananAdvokasi::count();
        $pengurusCount = StrukturPengurus::count();
        $pengurus = StrukturPengurus::all();
        return view('landing', compact('beasiswas', 'mitra', 'beasiswaCount', 'layananCount', 'pengurusCount', 'pengurus'));
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