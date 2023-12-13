<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function register()
    {
        return view('register');
    }
    public function doregister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',

        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return redirect()->route('register')->with('success',"Registered Successfully");
    }
    public function login()
    {
        return view('login');
    }
    public function dologin(Request $request)
    {
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.',
        ]);
    }
    public function dashboard()
    {
        $user=Auth::user();
        
        return view('dashboard',compact('user'));
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
