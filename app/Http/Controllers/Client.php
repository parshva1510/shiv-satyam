<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client extends Controller
{
    public function add_client()
    {
        return view('admin/add_client');
    }
}
