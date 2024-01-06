<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class);
    }

    public function dospem1()
    {
        return $this->hasMany(Skripsi::class, 'dospem1');
    }

    public function dospem2()
    {
        return $this->hasMany(Skripsi::class, 'dospem2');
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
