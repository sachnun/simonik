<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    // guarded
    protected $guarded = ['id'];

    // relasi ke tabel pemeriksaan
    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    // relasi ke tabel progress_pemeriksaan
    public function progress_pemeriksaan()
    {
        return $this->belongsTo(ProgressPemeriksaan::class);
    }
}
