<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['mahasiswa'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class);
    }

    public function skripsi()
    {
        return $this->hasOne(Skripsi::class);
    }
}
