<?php

namespace App\Http\Controllers;
use App\Models\transporter;
use App\Models\weight_entry;

use Illuminate\Http\Request;

class reportcontroller extends Controller
{
    public function reports()
   {
          $data=transporter::get()->all();
          $sr_no = transporter::get();
          return view('admin.reports',["transporter" => $data,'sr_no'=>$sr_no]);
   }
   
}
