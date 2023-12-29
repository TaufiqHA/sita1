<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()->dosen)
        {
            Dosen::create([
                'user_id' => auth()->user()->id
            ]);
        }

        $avatar = auth()->user()->avatar;

        return view('dosen.index', ['title' => 'Dashboard', 'avatar' => $avatar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.add');
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
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'kategori' => 'required',
            'status' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Dosen::where('id', $dosen->id)->update($validated);

        return back()->with([
            'success' => 'Berhasil menambahkan data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        //
    }
}
