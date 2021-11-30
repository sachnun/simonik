<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Progress;
use App\Models\Pemeriksaan;
use App\Models\ProgressPemeriksaan;

class PemeriksaanObserver
{
    /**
     * Handle the Pemeriksaan "created" event.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return void
     */
    public function created(Pemeriksaan $pemeriksaan)
    {
        // create progress data dari progress_pemeriksaan jika masih kosong
        foreach (ProgressPemeriksaan::all() as $key) {
            $progress = Progress::where('progress_pemeriksaan_id', $key['id'])
                ->where('pemeriksaan_id', $pemeriksaan->id)
                ->first();

            if (!$progress) {
                Progress::create([
                    'progress_pemeriksaan_id' => $key['id'],
                    'pemeriksaan_id' => $pemeriksaan->id
                ]);
            }
        }
    }

    /**
     * Handle the Pemeriksaan "updated" event.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return void
     */
    public function updated(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Handle the Pemeriksaan "deleted" event.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return void
     */
    public function deleted(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Handle the Pemeriksaan "restored" event.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return void
     */
    public function restored(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Handle the Pemeriksaan "force deleted" event.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return void
     */
    public function forceDeleted(Pemeriksaan $pemeriksaan)
    {
        //
    }
}
