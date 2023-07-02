<?php

namespace App\Http\Controllers;

use App\Models\InfoKos;
use App\Models\LayananAdvokasi;
use App\Models\Mitra;
use App\Models\Partner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $infokosCount = InfoKos::count();
        $advokasiCount = LayananAdvokasi::count();
        $mitraCount = Mitra::count();
        $partnerCount = Partner::count();


        return view('admin.dashboard', compact('infokosCount', 'advokasiCount', 'mitraCount', 'partnerCount'));
    }
}