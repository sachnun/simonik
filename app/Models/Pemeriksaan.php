<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    // guarded
    protected $guarded = ['id'];

    // persentase
    public function percent()
    {
        $progress = $this->progress()
            ->join('progress_pemeriksaans', 'progress.progress_pemeriksaan_id', '=', 'progress_pemeriksaans.id');
        $total_sum =  (float) $progress->sum('nilai_bobot');
        $bobot_sum = (float) $progress->where('check', 1)->sum('nilai_bobot');

        return round($bobot_sum / $total_sum * 100);
    }

    // status
    public function status_menu()
    {
        $progress =  $this->percent();
        $jatuh_tempo =  $this->tanggal_jatuh_tempo_sp2;
        $nomor_nd = $this->nomor_nd_perpanjangan;

        if ($progress >= '100') {
            return 'selesai';
        }

        if ($nomor_nd != null) {
            return 'diperpanjang';
        }

        if (Carbon::parse($jatuh_tempo) < Carbon::now() && $jatuh_tempo != null) {
            return 'jatuh_tempo';
        }

        if (Carbon::parse($jatuh_tempo) <= Carbon::now()->addDays(30) && $jatuh_tempo != null) {
            return 'akan_jatuh_tempo';
        }

        return 'dalam_proses';
    }

    // relasi ke table progres
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}
