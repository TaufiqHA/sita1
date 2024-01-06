<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dospem1()
    {
        return $this->belongsTo(Dosen::class, 'dospem1_id');
    }

    public function dospem2()
    {
        return $this->belongsTo(Dosen::class, 'dospem2_id');
    }

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }
}
