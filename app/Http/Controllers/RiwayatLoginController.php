<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatLoginController extends Controller
{
    public function index()
    {
        return view('dashboard.riwayat.index', [
            'riwayats' => Riwayat::with('user')->orderByDesc('waktu')->paginate(10)
        ]);
    }
}
