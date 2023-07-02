<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

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
        $validatedData = $request->validate([
            'link_mitra' => 'required',
            'nama_cp' => 'required',
            'link_cp' => 'required',
        ]);

        // Create a new Mitra record
        Mitra::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
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
        // Find the Mitra record by its ID
        $mitra = Mitra::find($id);

        // If the Mitra record is not found, redirect back with an error message
        if (!$mitra) {
            return redirect()->back()->with('error', 'Mitra not found.');
        }

        // Validate the input data
        $validatedData = $request->validate([
            'link_mitra' => 'required',
            'nama_cp' => 'required',
            'link_cp' => 'required',
        ]);

        // Update the Mitra record
        $mitra->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the Mitra record by its ID
        $mitra = Mitra::find($id);

        // If the Mitra record is not found, redirect back with an error message
        if (!$mitra) {
            return redirect()->back()->with('error', 'Mitra not found.');
        }

        // Delete the Mitra record
        $mitra->delete();

        // Redirect to the index page with a success message
        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully.');
    }
}