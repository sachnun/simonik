<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratKetetapanPajakRequest;
use Illuminate\Http\Request;
use App\Models\SuratKetetapanPajak;

class SuratKetetapanPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.surat-ketetapan-pajak.index', [
            'surat_ketetapan_pajaks' => SuratKetetapanPajak::orderByDesc('created_at')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.surat-ketetapan-pajak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratKetetapanPajakRequest $request)
    {
        // simpan data validasi ke variabel
        $validated = $request->validated();

        // menyimpan data validasi ke table database
        SuratKetetapanPajak::create($validated);

        // kembali ke halaman index dengan pesan success
        return redirect()->route('surat-ketetapan-pajak.index')->with('success', 'Data berhasil ditambahkan');
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
        $surat_ketetapan_pajak = SuratKetetapanPajak::findOrFail($id);

        // mengirim data ke view
        return view('dashboard.surat-ketetapan-pajak.show', [
            'surat_ketetapan_pajak' => $surat_ketetapan_pajak
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
        $surat_ketetapan_pajak = SuratKetetapanPajak::findOrFail($id);

        // mengirim data ke view
        return view('dashboard.surat-ketetapan-pajak.edit', [
            'surat_ketetapan_pajak' => $surat_ketetapan_pajak
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratKetetapanPajakRequest $request, $id)
    {
        //menyimpan data validasi ke variabel
        $validated = $request->validated();

        // mengambil data berdasarkan id
        $surat_ketetapan_pajak = SuratKetetapanPajak::findOrFail($id);

        // mengupdate data
        $surat_ketetapan_pajak->update($validated);

        // kembali ke halaman show dengan pesan sukses
        return redirect()
            ->route('surat-ketetapan-pajak.show', $surat_ketetapan_pajak->id)
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mengambil data berdasarkan id
        $surat_ketetapan_pajak = SuratKetetapanPajak::findOrFail($id);

        // menghapus data
        $surat_ketetapan_pajak->delete();

        // kembali ke halaman index dengan pesan danger
        return redirect()->route('surat-ketetapan-pajak.index')->with('danger', 'Data berhasil dihapus');
    }
}
