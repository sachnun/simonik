<?php

namespace App\Models;

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

    // relasi ke table progres
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}
