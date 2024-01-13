<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Judul;

class AdminController extends Controller
{
    public function index()
    {
        $avatar = auth()->user()->avatar;
        return view('admin.index', ['title' => 'Dashboard', 'avatar' => $avatar]);
    }

    public function judul()
    {
        $judul = Judul::all();

        return view('admin.judul', ['title' => 'Tugas Akhir', 'avatar' => auth()->user()->avatar, 'judul' => $judul]);
    }
}
