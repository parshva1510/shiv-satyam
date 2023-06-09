<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function add_user()
    {
        return view('admin/add_user');
    }

}
