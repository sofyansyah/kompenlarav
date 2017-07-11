<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }
    public function postlogin(Request $r)
    {
        $this->validate($r, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $r->email, 'password' => $r->password])) {
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error','email dan password yang anda masukan tidak sesuai');
    }
}
