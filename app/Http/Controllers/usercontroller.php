<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
        $cek=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($cek))
        {
            $user= Auth::user();

            return redirect()->route('home')->with('status','selamat datang' .$user->name);
        }
        return back()->with('status','email atau password salah');
    }
    public function register()
    {
        return view('register');
    }
    public function postregister(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'
    ]);

    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'role'=>'customer'
    ]);
    return redirect()->route('login')->with('status','berhasil daftar');
}
    public function home()
    {
        $user = Auth::user();

        if ($user->role == 'admin')
        {
            return  view('home');
        }
        else
        {
            return redirect()->route('customer.home');
        }
    }
    public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}
}
