<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ticket extends Controller
{
    public function add_ticket()
    {
        return view('admin/add_ticket');
    }

   public function view_ticket()
   {
        return view('admin/view_ticket');
   }
}
