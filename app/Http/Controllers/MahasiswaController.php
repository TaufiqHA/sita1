<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dosen;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()->mahasiswa)
        {
            Mahasiswa::create([
                'user_id' => auth()->user()->id
            ]);
        }

        return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();

        return view('mahasiswa.add', ['data' => $dosen]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required',
            'sks' => 'required',
            'tanggal_ta' => 'required',
            'surah' => 'required',
            'ipk' => 'required',
            'hp' => 'required',
            'dosen_pa' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Mahasiswa::where('id', $mahasiswa->id)->update($validated);

        return back()->with([
            'success' => 'berhasil menambahkan data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
