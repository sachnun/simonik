<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Requests\DaftarUserRequest;

class DaftarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check auth is not role admin
        if (auth()->user()->role != 'admin') {
            return abort(403);
        }

        return view('dashboard.daftar-user.index', [
            'users' => User::orderByDesc('updated_at')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.daftar-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DaftarUserRequest $request)
    {
        // check auth is not role admin
        if (auth()->user()->role != 'admin') {
            return abort(403);
        }

        // validasi password with confirmed
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ]);

        // simpan ke dalam database
        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nip_sikka' => $request->nip_sikka,
            'password' => bcrypt($request->password),
        ]);
        $user->role = $request->role;
        $user->save();

        // redirect ke halaman index dengan pesan success
        return redirect()->route('daftar-user.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check auth is not same id or is not admin
        if (auth()->user()->id != $id and auth()->user()->role != 'admin') {
            return abort(403);
        }

        return view('dashboard.daftar-user.show', [
            'user' => User::findOrFail($id),
            'riwayats' => Riwayat::where('user_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check auth is not same id or is not admin
        if (auth()->user()->id != $id and auth()->user()->role != 'admin') {
            return abort(403);
        }

        return view('dashboard.daftar-user.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DaftarUserRequest $request, $id)
    {
        // check auth is not same id or is not admin
        if (auth()->user()->id != $id and auth()->user()->role != 'admin') {
            return abort(403);
        }

        // mengambil data dari database
        $user = User::findOrFail($id);

        // mengecek apakah password diisi
        if ($request->filled('password')) {
            // validasi data password
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);

            // menyimpan password
            $user->password = bcrypt($request->password);
        }

        // update data ke database
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->nip_sikka = $request->nip_sikka;
        $user->role = $request->role;
        $user->save();

        // redirect ke halaman index dengan pesan success
        return redirect()->route('daftar-user.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check auth is not role admin
        if (auth()->user()->role != 'admin') {
            return abort(403);
        }

        // mengambil data dari database
        $user = User::findOrFail($id);

        // menghapus data
        $user->delete();

        // redirect ke halaman index dengan pesan danger
        return redirect()->route('daftar-user.index')->with('danger', 'Data berhasil dihapus');
    }
}
