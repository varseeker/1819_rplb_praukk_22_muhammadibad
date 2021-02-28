<?php
/**
     * Controller untuk authentikasi yang di buat secara manual.
     * @author Muhammad Ibadurrahman Al-ahsan  
     * @filesource User.php
     * @version
     */
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                if (Auth::user()->role == 'Admin') {
                    return redirect('/dashboard');
                }elseif (Auth::user()->role == 'Petugas') {
                    return redirect('/dashboard');
                }elseif (Auth::user()->role == 'Owner') {
                    return redirect('/dashboard');
                }
                return redirect('/');
            };
            return redirect('/login')->with('message', 'Email atau Password yang anda masukkan tidak sesuai.');
         
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(Request $request)
    {
        return('Regis Oke Bang');
    }
}
