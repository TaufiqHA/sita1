<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Skripsi;
use App\Models\Room;
use App\Models\DosenPembimbing;

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

        $mahasiswa = Mahasiswa::where('nama', '!=', null)->get();

        $avatar = auth()->user()->avatar;

        return view('judul.index', ['judul' => $judul, 'title' => 'Tugas Akhir', 'avatar' => $avatar, 'mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = '';
        if(auth()->user()->mahasiswa->nama)
        {
            $mahasiswa = auth()->user()->mahasiswa;
        }
        $avatar = auth()->user()->avatar;
        $dosen = Dosen::all();
        $judul = auth()->user()->mahasiswa->judul;
        $jumlah = count($judul);
        return view('judul.add', ['title' => 'Tugas Akhir', 'avatar' => $avatar, 'dosen' => $dosen, 'judul' => $judul, 'mahasiswa' => $mahasiswa, 'jumlah' => $jumlah]);
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
            'tanggal_pengajuan' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Mahasiswa::where('id', $request->mahasiswa_id)->update(['statusTA' => 'Diajukan']);

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
        $avatar = auth()->user()->avatar;
        return view('judul.detail', ['title' => 'Detail Judul', 'avatar' => $avatar, 'judul' => $judul]);
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

    public function download(Judul $judul)
    {
        return response()->download('storage/' . $judul->bukti, 'bukti konsultasi');
    }

    public function updateDospem(Judul $judul, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dospem1' => 'required',
            'dospem2' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        $validated['status'] = 'diterima';

        Judul::where('id', $judul->id)->update($validated);

        Mahasiswa::where('id', $judul->mahasiswa->id)->update(['statusTA' => 'Diterima']);

        return redirect(route('showJudulMahasiswa', ['mahasiswa' => $judul->mahasiswa->id]));
    }

    public function showJudulMahasiswa(Mahasiswa $mahasiswa, Request $request)
    {
        $avatar = auth()->user()->avatar;
        return view('judul.show', ['title' => 'List Judul', 'avatar' => $avatar, 'mahasiswa' => $mahasiswa]);
    }

    public function tolakJudul(Judul $judul, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alasan_penolakan' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Judul::where('id', $judul->id)->update(['status' => 'Ditolak', 'tanggal_ditolak' => now(), 'alasan_penolakan' => $validated['alasan_penolakan']]);
        return redirect(route('showJudulMahasiswa', ['mahasiswa' => $judul->mahasiswa->id]));
    }

    public function terimaJudul(Judul $judul, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_id' => 'required',
            'dospem1_id' => 'required',
            'dospem2_id' => 'required',
            'tanggal_disetujui' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Skripsi::create($validated);

        Judul::where('id', $judul->id)->update(['status' => 'Diterima']);

        Mahasiswa::where('id', $judul->mahasiswa->id)->update(['statusTA' => 'Diterima']);

        Room::create(['mahasiswa_id' => $judul->mahasiswa->id, 'dosen_id' => $request->dospem1_id]);
        Room::create(['mahasiswa_id' => $judul->mahasiswa->id, 'dosen_id' => $request->dospem2_id]);

        DosenPembimbing::create(['mahasiswa_id' => $judul->mahasiswa->id, 'dosen_id' => $request->dospem1_id, 'role' => 'dospem1']);
        DosenPembimbing::create(['mahasiswa_id' => $judul->mahasiswa->id, 'dosen_id' => $request->dospem2_id, 'role' => 'dospem2']);

        return redirect(route('showJudulMahasiswa', ['mahasiswa' => $judul->mahasiswa->id]));

    }

    public function diterima()
    {
        $avatar = auth()->user()->avatar;

        $judul = Judul::where('status', 'Diterima')->get();

        return view('kajur.judul', ['title' => 'Tugas Akhir', 'avatar' => $avatar, 'judul' => $judul]);
    }

    public function ditolak()
    {
        $avatar = auth()->user()->avatar;

        $judul = Judul::where('status', 'Ditolak')->get();

        return view('kajur.judul', ['title' => 'Tugas Akhir', 'avatar' => $avatar, 'judul' => $judul]);
    }

    public function diajukan()
    {
        $avatar = auth()->user()->avatar;

        $judul = Judul::where('status', 'Diajukan')->get();

        return view('kajur.judul', ['title' => 'Tugas Akhir', 'avatar' => $avatar, 'judul' => $judul]);
    }

    public function semua()
    {
        $avatar = auth()->user()->avatar;

        $judul = Judul::all();

        return view('kajur.judul', ['title' => 'Tugas Akhir', 'avatar' => $avatar, 'judul' => $judul]);
    }
}
