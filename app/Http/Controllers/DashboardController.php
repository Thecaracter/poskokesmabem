<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\InfoKos;
use App\Models\Jurusan;
use App\Models\LayananAdvokasi;
use App\Models\Mitra;
use App\Models\Partner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jurusanCount = Jurusan::count();
        $advokasiCount = LayananAdvokasi::count();
        $mitraCount = Mitra::count();
        $beasiswaCount = Beasiswa::count();


        return view('admin.dashboard', compact('jurusanCount', 'advokasiCount', 'mitraCount', 'beasiswaCount'));
    }
}