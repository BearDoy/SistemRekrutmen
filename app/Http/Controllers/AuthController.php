<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function proseslogin(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'level' => 'admin'
        ])) {
            return redirect('/home');
        } else {
            if (Auth::attempt([
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'level' => 'user'
            ])) {
                return redirect('/home');
                // return redirect('../pelamar/biodata');
            }
        }

        return redirect('/')->with('gagal', 'Username / Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/rekrutmen');
    }
}
