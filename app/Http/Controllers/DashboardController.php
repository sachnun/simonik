<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
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
            'pemeriksaans' => Pemeriksaan::all()
        ]);
    }
}
