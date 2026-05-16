<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Pastikan file ini ada di resources/views/mahasiswa/login.blade.php
        return view('mahasiswa.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mencari user berdasarkan username dan password plain-text (sesuai database kamu)
        $user = User::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
            session([
                'user_id' => $user->id,
                'username' => $user->username,
                'nama_lengkap' => $user->nama_lengkap, // Mengambil kolom nama_lengkap dari SQL kamu
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function dashboard()
    {
        if (!session()->has('user_id')) {
            return redirect('/');
        }

        return view('mahasiswa.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}