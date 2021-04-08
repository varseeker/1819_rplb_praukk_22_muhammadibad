<?php

/**
 * Controller untuk authentikasi yang di buat secara manual.
 * @author Muhammad Ibadurrahman Al-ahsan  
 * @filesource User.php
 * @version
 */

namespace App\Http\Controllers;

use App\User;
use App\M_Customer;
use App\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class Authentikasi extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('dashboard', compact('user'));
    }

    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        /* $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $data = User::where('email',$request->email)->firstOrFail();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                session(['berhasil_login' => true]);
                return redirect('/dashboard');
            } */
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'Admin') {
                Logs::create([
                    'event' => 'LOGIN',
                    'person' => Auth::user()->id,
                    'detail' => 'Admin Melakukan Login Ke Aplikasi'
                ]);
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'Petugas') {
                Logs::create([
                    'event' => 'LOGIN',
                    'person' => Auth::user()->id,
                    'detail' => 'Petugas Melakukan Login Ke Aplikasi'
                ]);
                return redirect('/dashboard');
            } elseif (Auth::user()->role == 'Owner') {
                Logs::create([
                    'event' => 'LOGIN',
                    'person' => Auth::user()->id,
                    'detail' => 'Owner Melakukan Login Ke Aplikasi'
                ]);
                return redirect('/dashboard');
            }
            Logs::create([
                'event' => 'LOGIN',
                'person' => Auth::user()->id,
                'detail' => 'Customer Melakukan Login Ke Aplikasi'
            ]);
            return redirect('/');
        };
        return redirect('/login')->with('message', 'Email atau Password yang anda masukkan tidak sesuai.');
    }

    public function logout(Request $request)
    {

        if (Auth::user()->role == 'Admin') {
            Logs::create([
                'event' => 'LOGOUT',
                'person' => Auth::user()->id,
                'detail' => 'Admin Melakukan Logout Dari Aplikasi'
            ]);
        } elseif (Auth::user()->role == 'Petugas') {
            Logs::create([
                'event' => 'LOGOUT',
                'person' => Auth::user()->id,
                'detail' => 'Petugas Melakukan Logout Dari Aplikasi'
            ]);
        } elseif (Auth::user()->role == 'Owner') {
            Logs::create([
                'event' => 'LOGOUT',
                'person' => Auth::user()->id,
                'detail' => 'Owner Melakukan Logout Dari Aplikasi'
            ]);
        } elseif (Auth::user()->role == 'Customer') {
            Logs::create([
                'event' => 'LOGOUT',
                'person' => Auth::user()->id,
                'detail' => 'Customer Melakukan Logout Dari Aplikasi'
            ]);
        }
        Auth::logout();
        return redirect('/login');
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(Request $request)
    {
        M_Customer::create([
            'id' => '',
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->no_tlp,
        ]);

        User::create([
            'id' => '',
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login');
    }
}
