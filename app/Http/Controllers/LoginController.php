<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if(Auth::attempt($credentials)){
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'big cock and also balls',
        ]);
    }

    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
