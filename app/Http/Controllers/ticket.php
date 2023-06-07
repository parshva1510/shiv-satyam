<?php

namespace App\Http\Controllers;
use App\Models\demo;
use App\Models\transporter;
use Illuminate\Http\Request;

class ticket extends Controller
{
    public function add_ticket()
    {
        return view('admin.add_ticket');
    }

   public function view_ticket()
   {
        return view('admin.view_ticket');
   }

   public function demo()
   {
        return view('admin.demo');
   }
   public function client()
   {
     $data=transporter::get()->all();
     dd($data);
        return view('admin.add_client');
   }

   public function formsubmit(Request $data)
   {

     $data->validate([
          'transporter'=>'required'
     ]);
     
     $datainsert=new demo();

     $datainsert->ticket_no = $data->ticket_no;
     $datainsert->transporter = $data->transporter;
     $datainsert->vehicle_no = $data->vehicle_no;
     $datainsert->gross_weight = $data->gross_weight;
     $datainsert->gross_date = $data->gross_date;

     $datainsert->save();
     return view('admin.demo')->with("success","data has been saved");


   }
   public function add_transporter(Request $req){

     $req->validate([
          'name'=>'required'
     ]);
     $data=new transporter();
     $data->name=$req->name;
     $data->city=$req->city;
     $data->contact=$req->contact;
     $data->remark=$req->remark;
     $data->save();
   
     return view('admin.add_client');
   }
  
}
