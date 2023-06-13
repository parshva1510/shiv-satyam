<?php

namespace App\Http\Controllers;
use App\Models\demo;
use App\Models\transporter;
use App\Models\weight_entry;
use Illuminate\Http\Request;

class ticket extends Controller
{
     public function index(){
          $data=transporter::get()->all();
          $sr_no = transporter::get()->last()->sr_no;
          return view('admin.add_ticket',["transporter" => $data,'sr_no'=>$sr_no]);
     }
     public function add_ticket(Request $req)
     {
         $datainsert = new weight_entry();
         $req->validate([
             'ticket_no' => 'required',
             'transpoter_no' => 'required',
             'vehicle_no' => 'required',
             'gross_weight' => 'required',
             'tare_weight' => 'required',
             'tare_date' => 'required',
             'net_weight' => 'required',
             'charges' => 'required',
             'payment_mode' => 'required',
             'remark' => 'required'
          ]);
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
     //     $datainsert->payment_mode = $req->payment_mode;
     
         $datainsert->save();
     
         // Fetch the list of transporters separately
         $transporters = Transporter::all();
     
         return view('admin.add_ticket', ["transporter" => $transporters]);
     }

   public function view_ticket()
   {
     $transporters = Transporter::all();
     $data=weight_entry::with('transporter')->get();
     return view('admin.view_ticket',compact('data'));
     
   }

   public function edit_ticket($sr_no)
   {
     $data = weight_entry::findOrFail($sr_no);
  
     // dd($sr_no);
     return view('admin.add_ticket',["transporter" => $data]);
   }
   


   public function demo()
   {
        return view('admin.demo');
   }
   
   public function show_transporter()
   {
     $sr_no = transporter::get()->last()->sr_no;
    
     return view('admin.add_ticket', ['sr_no' => $sr_no]);
        
   }

   public function add_transporter(Request $req){
     
        $data=new transporter();
        $data->sr_no=$req->ac_no;
        $data->name=$req->name;
        $data->city=$req->city;
        $data->contact=$req->contact;
        $data->remark=$req->remark;
        $data->save();
        return redirect()->back();
   }
}
