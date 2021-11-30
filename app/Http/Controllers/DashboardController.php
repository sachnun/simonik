<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\SuratKetetapanPajak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'pemeriksaans' => Pemeriksaan::all(),
            'nominal_diterbitkan' => SuratKetetapanPajak::sum('nominal_terbit'),
            'nominal_disetujui' => SuratKetetapanPajak::sum('nominal_disetujui'),
        ]);
    }
}
