<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportcontroller extends Controller
{
    public function reports()
   {
        return view('admin.reports');
   }
}
