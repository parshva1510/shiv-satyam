<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Payment extends Controller
{
    public function add_payment()
    {
        return view('admin/add_payment');
    }
}
