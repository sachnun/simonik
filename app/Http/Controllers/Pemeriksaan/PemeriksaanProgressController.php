<?php

namespace App\Http\Controllers\Pemeriksaan;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Progress;
use App\Models\ProgressPemeriksaan;

class PemeriksaanProgressController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // menampilkan data pemeriksaan berdasarkan id
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        $progress = Progress::where('pemeriksaan_id', $pemeriksaan->id)
            ->join('progress_pemeriksaans', 'progress.progress_pemeriksaan_id', '=', 'progress_pemeriksaans.id')
            ->where('pemeriksaan_id', $pemeriksaan->id)
            ->where('type', 'checkbox')
            ->orderBy('posisi', 'asc')
            ->get();

        $progress_files = Progress::where('pemeriksaan_id', $pemeriksaan->id)
            ->join('progress_pemeriksaans', 'progress.progress_pemeriksaan_id', '=', 'progress_pemeriksaans.id')
            ->where('type', 'file')
            ->orderBy('posisi', 'asc')
            ->get();

        return view('dashboard.pemeriksaan.progress', [
            'pemeriksaan' => $pemeriksaan,
            'progress' => $progress,
            'progress_files' => $progress_files,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return dd($request->files);

        // menampilkan data pemeriksaan berdasarkan id
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        // update pemeriksaan
        $pemeriksaan->update([
            'nomor_sp2' => $request->nomor_sp2,
            'tanggal_jatuh_tempo_sp2' => $request->tanggal_jatuh_tempo_sp2,
        ]);

        // update tanggal_pelaksanaan
        foreach ($request->tanggal_pelaksanaan as $index => $key) {
            Progress::where('progress_pemeriksaan_id', $index)
                ->where('pemeriksaan_id', $pemeriksaan->id)
                ->update(['tanggal_pelaksanaan' => $key]);
        }

        // update keterangan
        foreach ($request->keterangan as $index => $key) {
            Progress::where('progress_pemeriksaan_id', $index)
                ->where('pemeriksaan_id', $pemeriksaan->id)
                ->update(['keterangan' => $key]);
        }

        // clear check type checkbox
        Progress::where('pemeriksaan_id', $pemeriksaan->id)
            ->join('progress_pemeriksaans', 'progress.progress_pemeriksaan_id', '=', 'progress_pemeriksaans.id')
            ->where('type', 'checkbox')
            ->update(['check' => false]);

        // update check if exits
        if (!empty($request->check)) {
            foreach ($request->check as $index => $key) {
                Progress::where('progress_pemeriksaan_id', $index)
                    ->where('pemeriksaan_id', $pemeriksaan->id)
                    ->update(['check' => true]);
            }
        }

        // upload and update file
        if (!empty($request->file)) {
            foreach ($request->file as $index => $key) {
                $file = $key->store('files', 'public');

                Progress::where('progress_pemeriksaan_id', $index)
                    ->where('pemeriksaan_id', $pemeriksaan->id)
                    ->update([
                        'check' => true,
                        'file' => $file
                    ]);
            }
        }

        // kembali ke halaman edit dengan pesan success
        return redirect()->route('progress.edit', $pemeriksaan->id)->with('success', 'Data berhasil diperbarui');
    }
}
