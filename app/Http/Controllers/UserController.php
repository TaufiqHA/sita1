<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rules\File;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kajur;
use App\Models\Sekjur;
use App\Models\Admin;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Role::all();
        $avatar = auth()->user()->avatar;
        return view('user.add', ['role' => $data, 'title' => 'Tambah User', 'avatar' => $avatar]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        User::create($validated);

        $latest = User::latest()->first();

        if($latest->role_id === 1) {
            Mahasiswa::create([
                'user_id' => $latest->id
            ]);

            return back()->with([
                'success' => 'Mahasiswa berhasil ditambahkan'
            ]);
        } else if($latest->role_id === 2) {
            Dosen::create([
                'user_id' => $latest->id
            ]);

            return back()->with([
                'success' => 'Dosen berhasil ditambahkan'
            ]);
        } else  if($latest->role_id === 3) {
            Kajur::create([
                'user_id' => $latest->id
            ]);

            return back()->with([
                'success' => 'Kajur berhasil ditambahkan'
            ]);
        } else if($latest->role_id === 4) {
            Sekjur::create([
                'user_id' => $latest->id
            ]);

            return back()->with([
                'success' => 'Sekjur berhasil ditambahkan'
            ]);
        } else {
            Admin::create([
                'user_id' => $latest->id
            ]);

            return back()->with([
                'success' => 'Admin berhasil ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $avatar = $user->avatar;
        $roleId = $user->role_id;
        $role = '';
        $mahasiswa = $user->mahasiswa;

        if ($roleId === 1) {
            $role = 'main';
        } else if($roleId === 2) {
            $role = 'dosen';
        } else if($roleId === 3) {
            $role = 'kajur';
        } else if($roleId === 4) {
            $role = 'sekjur';
        } else {
            $role = 'admin';
        }

        return view('user.show', ['title' => 'Pengaturan Akun', 'avatar' => $avatar, 'user' => $user, 'role' => $role, 'mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'avatar' => [
                'nullable',
                File::types(['jpg', 'jpeg', 'png'])
            ]
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        if($request->file('avatar'))
        {
            $validated['avatar'] = $request->file('avatar')->store('image');
        }

        User::where('id', $user->id)->update($validated);

        return back()->with([
            'success' => 'Berhasil Update Data'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateTema(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tema' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => 'Gagal memperbarui tema.'], 403);
        }

        $validated = $validator->validate();

        User::where('id', auth()->user()->id)->update($validated);

        return response()->json(['message' => 'Tema berhasil diperbarui.']);
    }
}
