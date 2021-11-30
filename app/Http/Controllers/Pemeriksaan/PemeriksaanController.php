<?php

namespace App\Http\Controllers\Pemeriksaan;

use App\Models\Progress;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Models\ProgressPemeriksaan;
use App\Http\Controllers\Controller;
use App\Http\Requests\PemeriksaanRequest;

class PemeriksaanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pemeriksaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PemeriksaanRequest $request)
    {
        // simpan data validasi ke variabel
        $validated = $request->validated();

        // simpan data validated ke database
        $pemeriksaan = Pemeriksaan::create($validated);

        // switch kriteria_pemeriksaan
        switch ($pemeriksaan->kriteria_pemeriksaan) {
            case 'rutin':
                $route = 'pemeriksaan.rutin';
                break;
            case 'khusus':
                $route = 'pemeriksaan.khusus';
                break;
            case 'tujuan_lain':
                $route = 'pemeriksaan.tujuan-lain';
                break;
            default:
                return redirect()->route('home');
                break;
        }

        // kembali ke halaman index dengan menampilkan pesan sukses
        return redirect()->route($route)->with(['success' => 'Data berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data berdasarkan id
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        // switch kriteria_pemeriksaan route
        switch ($pemeriksaan->kriteria_pemeriksaan) {
            case 'rutin':
                $route = 'pemeriksaan.rutin';
                break;
            case 'khusus':
                $route = 'pemeriksaan.khusus';
                break;
            case 'tujuan_lain':
                $route = 'pemeriksaan.tujuan-lain';
                break;
            default:
                $route = 'home';
                break;
        }

        // menampilkan data pemeriksaan
        return view('dashboard.pemeriksaan.show', [
            'pemeriksaan' => $pemeriksaan,
            'documents' => $pemeriksaan->progress()
                ->join('progress_pemeriksaans', 'progress.progress_pemeriksaan_id', '=', 'progress_pemeriksaans.id')
                ->where('type', 'file')
                ->get(),
            'kembali' => url()->route($route)
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
        // mengambil data berdasarkan id
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        return view('dashboard.pemeriksaan.edit', [
            'pemeriksaan' => $pemeriksaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PemeriksaanRequest $request, $id)
    {
        // simpan data validasi ke variabel
        $validated = $request->all();

        // mengambil data berdasarkan id
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        // update data
        $pemeriksaan->update($validated);

        // kembali ke halaman show dengan menampilkan pesan sukses
        return redirect()->route('pemeriksaan.show', $pemeriksaan->id)->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mengambil data pemeriksaan berdasarkan id
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        // menghapus data pemeriksaan
        $pemeriksaan->delete();

        // kembali ke halaman semeblumnya dengan menampilkan pesan danger
        return redirect()->back()->with(['danger' => 'Data berhasil dihapus']);
    }
}
