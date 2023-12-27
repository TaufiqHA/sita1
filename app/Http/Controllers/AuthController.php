<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        if(Auth::attempt($validated))
        {
            $request->session()->regenerate();

            if(auth()->user()->role_id === 1) {
                return redirect('/mahasiswa');
            } else if(auth()->user()->role_id === 2) {
                return redirect('/dosen');
            } else if(auth()->user()->role_id === 3) {
                return redirect('/kajur');
            } else if(auth()->user()->role_id === 4) {
                return redirect('/sekjur');
            } else {
                return redirect('/admin');
            }
        }

        return back()->with([
            'error' => 'Username atau password tidak sesuai !!!'
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
