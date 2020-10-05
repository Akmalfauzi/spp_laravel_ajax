<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('admin.auth.index');
    }

    public function login(Request $request)
    {
        // cek role
    	if (Auth::attempt($request->only('name','password'))) {
            if (auth()->user()->role_id == ADMIN) {
                return redirect()->route('admin.dashboard')->with('alertlogin','');
            }elseif (auth()->user()->role_id == MURID) {
                return redirect()->route('history')->with('alertlogin','');
            }
            elseif (auth()->user()->role_id == PETUGAS) {
                return redirect()->route('admin.dashboard')->with('alertlogin','');
            }
        }

        // Jika Gagal Login
        return redirect()->back()->with('error','');
    }

    public function logout()
    {
        request()->session()->flush();
    	Auth::logout();
        return redirect('login');
    }
}
