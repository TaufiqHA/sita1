<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index()
    {

        $mahasiswa = auth()->user()->mahasiswa;

        return view('mahasiswa.seminar', ['title' => 'Pendaftaran', 'avatar' => auth()->user()->avatar, 'mahasiswa' => $mahasiswa]);
    }
}
