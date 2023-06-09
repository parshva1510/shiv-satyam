<?php

namespace App\Http\Controllers;
use App\Models\transporter;
use Illuminate\Http\Request;

class addtransporter extends Controller
{
    public function show_transporter()
    {
        
        return view('admin.add_transporter');
    }
    public function add_transporter(Request $req){

      

        $data=new transporter();
        $data->name=$req->name;
        $data->city=$req->city;
        $data->contact=$req->contact;
        $data->remark=$req->remark;
        
        $data->save();
        return view('admin.add_transporter');
      }
}
