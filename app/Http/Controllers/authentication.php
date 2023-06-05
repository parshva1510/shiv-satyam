<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authentication extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function changepassword()
    {
        return view('changepassword');
    }
}
