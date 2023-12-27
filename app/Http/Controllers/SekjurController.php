<?php

namespace App\Http\Controllers;

use App\Models\Sekjur;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SekjurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()->sekjur)
        {
            Sekjur::create([
                'user_id' => auth()->user()->id
            ]);
        }

        return view('sekjur.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sekjur.add');
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
    public function show(Sekjur $sekjur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sekjur $sekjur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sekjur $sekjur)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nip' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Sekjur::where('id', $sekjur->id)->update($validated);

        return back()->with([
            'success' => 'Data Kajur Berhasil Ditambahkan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekjur $sekjur)
    {
        //
    }
}
