<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class BimbinganController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $room = $mahasiswa->room;
        return view('mahasiswa.bimbingan', ['title' => 'Bimbingan', 'avatar' => auth()->user()->avatar, 'room' => $room, 'mahasiswa' => $mahasiswa]);
    }

    public function indexDosen()
    {
        $dosen = auth()->user()->dosen;
        $room = $dosen->room;
        return view('dosen.bimbingan', ['title' => 'Bimbingan', 'avatar' => auth()->user()->avatar, 'room' => $room, 'dosen' => $dosen]);
    }
}
