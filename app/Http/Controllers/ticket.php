<?php

namespace App\Http\Controllers;
use App\Models\demo;
use App\Models\transporter;
use App\Models\weight_entry;
use Illuminate\Http\Request;

class ticket extends Controller
{
     public function index(){
          return view('admin.add_ticket');
     }
    public function add_ticket(Request $req)
    {
     $datainsert = new weight_entry();


     
     $datainsert->ticket_no = $req->ticket_no;
     $datainsert->transpoter_no = $req->transpoter_no;
     $datainsert->vehicle_no = $req->vehical_no;
     $datainsert->gross_weight = $req->gross_weight;
     $datainsert->gross_date = $req->gross_date;
     $datainsert->tare_weight = $req->tare_wight;
     $datainsert->tare_date = $req->tare_date;
     $datainsert->net_weight = $req->net_weight;
     $datainsert->material = $req->material;
     $datainsert->charges = $req->charge;
     $datainsert->payment_mode = $req->payment_mode;
     $datainsert->remark = $req->remark;
     $datainsert->payment_mode = $req->payment_mode;

     $datainsert->save();
        return view('admin.add_ticket')->with("success","data has been added");
    }

   public function view_ticket()
   {
        return view('admin.view_ticket');
   }

   public function demo()
   {
        return view('admin.demo');
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
     return view('admin/demo');
   }
}
