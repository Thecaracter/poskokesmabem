<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Beasiswa;
use App\Models\InfoKos;
use App\Models\Jurusan;
use App\Models\Layanan;
use App\Models\LayananAdvokasi;
use App\Models\Mitra;
use App\Models\Prodi;
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
        $infokos = InfoKos::all();
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        $angkatan = Angkatan::all();
        $layanan = Layanan::all();
        return view('landing', compact('beasiswas', 'mitra', 'beasiswaCount', 'layananCount', 'pengurusCount', 'pengurus', 'infokos', 'jurusan', 'prodi', 'angkatan', 'layanan'));
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
        try {
            // Validasi data yang diterima dari request
            $request->validate([
                'nama' => 'required|string',
                'no_telp' => 'required|string',
                'kritik_saran' => 'required|string',
                'angkatan_id' => 'required|exists:angkatan,id',
                'jurusan_id' => 'required|exists:jurusan,id',
                'prodi_id' => 'required|exists:prodi,id',
                'layanan_id' => 'required|exists:layanan,id',
            ]);

            // Buat objek LayananAdvokasi baru dengan data yang diterima dari request
            $layananAdvokasi = new LayananAdvokasi();
            $layananAdvokasi->nama = $request->nama;
            $layananAdvokasi->no_telp = $request->no_telp;
            $layananAdvokasi->kritik_saran = $request->kritik_saran;
            $layananAdvokasi->angkatan_id = $request->angkatan_id;
            $layananAdvokasi->jurusan_id = $request->jurusan_id;
            $layananAdvokasi->prodi_id = $request->prodi_id;
            $layananAdvokasi->layanan_id = $request->layanan_id;

            // Simpan objek LayananAdvokasi ke database
            $layananAdvokasi->save();

            // Redirect ke halaman sebelumnya dengan SweetAlert
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Tangkap pengecualian dan berikan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
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