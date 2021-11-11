<?php

namespace App\Http\Controllers\Pemeriksaan;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemeriksaanKriteriaController extends Controller
{
    // Rutin
    public function indexRutin()
    {
        return view('dashboard.pemeriksaan.kriteria.rutin', [
            'pemeriksaans' => Pemeriksaan::where('kriteria_pemeriksaan', 'rutin')
                ->orderByDesc('created_at')
                ->paginate(10)
        ]);
    }

    // Khusus
    public function indexKhusus()
    {
        return view('dashboard.pemeriksaan.kriteria.khusus', [
            'pemeriksaans' => Pemeriksaan::where('kriteria_pemeriksaan', 'khusus')
                ->orderByDesc('created_at')
                ->paginate(10)
        ]);
    }

    // Tujuan Lain
    public function indexTujuanLain()
    {
        return view('dashboard.pemeriksaan.kriteria.tujuan_lain', [
            'pemeriksaans' => Pemeriksaan::where('kriteria_pemeriksaan', 'tujuan_lain')
                ->orderByDesc('created_at')
                ->paginate(10)
        ]);
    }
}
