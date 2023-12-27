<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role_id === 1)
        {
            $judul = Judul::where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
        } else {
            $judul = Judul::all();
        }
        return view('judul.index', ['judul' => $judul]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa->id;
        return view('judul.add', ['mahasiswa_id' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mahasiswa_id' => 'required',
            'judul' => 'required',
            'konsentrasi' => 'required',
            'metode' => 'required',
            'teknik' => 'required',
            'bentuk_data' => 'required',
            'tempat' => 'required',
            'nama_dosen1' => 'required',
            'nama_dosen2' => 'required',
            'nama_dosen3' => 'required',
            'nama_dosen4' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        if($request->file('bukti'))
        {
            $validated['bukti'] = $request->file('bukti')->store('file');
        }

        Judul::create($validated);

        return back()->with([
            'success' => 'Judul berhasil diajukan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Judul $judul)
    {
        $role = '';

        if(auth()->user()->role_id === 1)
        {
            $role = 'mahasiswa';
        } else if(auth()->user()->role_id === 3)
        {
            $role = 'kajur';
        }

        return view('judul.edit', ['judul' => $judul, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Judul $judul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Judul $judul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Judul $judul)
    {
        //
    }

    public function updateStatus(Request $request, Judul $judul)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Judul::where('id', $judul->id)->update($validated);

        return redirect('/judul');
    }
}
