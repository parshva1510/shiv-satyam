<?php

namespace App\Http\Controllers;
use App\Models\transporter;
use Illuminate\Http\Request;

class client extends Controller
{
    public function show_client()
    {
        $sr_no = transporter::get()->last()->sr_no;
        // $sr_no = transporter::latest()->value('sr_no');

        // dd($id);
        return view('admin.add_client', ['sr_no' => $sr_no]);
        
    }
    public function add_client(Request $req){

      

        $data=new transporter();
        $data->name=$req->name;
        $data->city=$req->city;
        $data->contact=$req->contact;
        $data->remark=$req->remark;
        
        $data->save();
        return view('admin.add_client');
      }
}
