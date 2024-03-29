<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function judul()
    {
        return $this->hasMany(Judul::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_pembimbings');
    }
}
