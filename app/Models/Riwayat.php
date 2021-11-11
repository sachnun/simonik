<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    // guarded
    protected $guarded = ['id'];

    // no timestamp
    public $timestamps = false;

    // relasi ke table user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
