<?php

namespace App\Http\Controllers;

use App\Models\Kajur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KajurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()->kajur)
        {
            Kajur::create([
                'user_id' => auth()->user()->id
            ]);
        }

        return view('kajur.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kajur.add');
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
    public function show(Kajur $kajur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kajur $kajur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kajur $kajur)
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

        Kajur::where('id', $kajur->id)->update($validated);

        return back()->with([
            'success' => 'Data Kajur Berhasil Ditambahkan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kajur $kajur)
    {
        //
    }
}
