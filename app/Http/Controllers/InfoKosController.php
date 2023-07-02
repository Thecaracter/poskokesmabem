<?php

namespace App\Http\Controllers;

use App\Models\InfoKos;
use Illuminate\Http\Request;

class InfoKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infokos = InfoKos::all();
        return view('admin.infokos', compact('infokos'));
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
            'link_kos_jbr' => 'required',
            'link_kos_bws' => 'required',
            'link_tanggapan' => 'required',
            'nama_cp' => 'required',
            'link_contact' => 'required',
        ]);

        InfoKos::create($request->all());

        return redirect()->route('infokos.index')->with('success', 'Info Kos created successfully.');
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
            'link_kos_jbr' => 'required',
            'link_kos_bws' => 'required',
            'link_tanggapan' => 'required',
            'nama_cp' => 'required',
            'link_contact' => 'required',
        ]);

        $infokos = InfoKos::findOrFail($id);
        $infokos->update($request->all());

        return redirect()->route('infokos.index')->with('success', 'Info Kos updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infokos = InfoKos::findOrFail($id);
        $infokos->delete();

        return redirect()->route('infokos.index')->with('success', 'Info Kos deleted successfully');
    }
}