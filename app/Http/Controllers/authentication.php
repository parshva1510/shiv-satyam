<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authentication extends Controller
{
    public function login()
    {
        return view('login');
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
