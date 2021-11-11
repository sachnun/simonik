<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login page
    public function login()
    {
        return view('dashboard.login');
    }

    // Login Submit
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nip_sikka' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            // menyimpan riwayat aktivitas
            Riwayat::create([
                'user_id' => Auth::user()->id,
                'aktivitas' => 'Login',
                'waktu' => Carbon::now(),
                'alamat_ip' => request()->getClientIp(),
            ]);

            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nip_sikka' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        // menyimpan riwayat aktivitas
        Riwayat::create([
            'user_id' => Auth::user()->id,
            'aktivitas' => 'Logout',
            'waktu' => Carbon::now(),
            'alamat_ip' => request()->getClientIp(),
        ]);

        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
