<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq', compact('faqs'));
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')->with('success', 'Mitra updated successfully.');
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Faq::findOrFail($id);
        $layanan->delete();

        return redirect()->route('faq.index')->with('success', 'Layanan deleted successfully');
    }
}