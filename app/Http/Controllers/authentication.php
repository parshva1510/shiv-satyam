<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class authentication extends Controller
{
    public function login()
    {
     return view('login');
    }
    public function index(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        

        if (auth()->attempt($credentials)) {
           
            return redirect()->intended('/home'); 
        } else {
            
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    

    public function reset_password()
    {
        return view('reset_password');
    }

    public function change_password()
    {
        return view('admin.change_password');
    }
}


