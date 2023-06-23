<?php

namespace App\Http\Controllers;
use App\Models\demo;
use App\Models\transporter;
use App\Models\weight_entry;
use DB;
use Illuminate\Http\Request;


class ticket extends Controller
{

     public function index(){
      
          $data=weight_entry::get()->all();
          $transporter =[];
          $tr_data=Transporter::all();
          $sr_no = transporter::get()->last()->sr_no;
          $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
          return view('admin.add_ticket',["transporter" => $transporter,'sr_no' => $sr_no, 'tr_data'=>$tr_data,'ticket_no'=> $ticket_no]);
     }
     public function add_ticket(Request $req)
     {
       
         $data = weight_entry::find($req->sr_no);
         $datainsert = new weight_entry();
         $sr_no = transporter::get()->last()->sr_no;
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
         $datainsert->save();
         $transporters = Transporter::all();
         $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
         return view('admin.add_ticket', ["transporter" => $data,'tr_data'=>$transporters,'sr_no' => $sr_no,'ticket_no'=> $ticket_no]);
     }

   public function view_ticket()
   {

      $transporters = Transporter::all();
      $data=weight_entry::with('transporter')->get();
      return view('admin.view_ticket',compact('data'));
     
   }
   public function client()
   {
     $data=transporter::get()->all();
     //dd($data);
        return view('admin.add_client');
   }

   public function edit_ticket(Request $req, $ticket_no)
{
     $sr_no = transporter::get()->last()->sr_no;
     $data = weight_entry::with('transporter')->find($ticket_no);
     $tr_data = transporter::all();
     return view('admin.add_ticket', ["transporter" => $data->toArray(), 'tr_data' => $tr_data,'sr_no' => $sr_no]);
}


   public function update_ticket(Request $req) {
     //dd($req->edit_sr_no);
      $data = weight_entry::with('transporter')->find($req->edit_sr_no);
      //$data->ticket_no = $req->input('ticket_no');
      $data->transpoter_no = strtoupper($req->input('transpoter_no'));
      $data->vehicle_no = $req->input('vehical_no');
      $data->gross_weight = $req->input('gross_weight');
      $data->gross_date = $req->input('gross_date');
      $data->tare_weight = $req->input('tare_wight');
      $data->tare_date = $req->input('tare_date');
      $data->net_weight = $req->input('net_weight');
      $data->material = strtoupper($req->input('material'));
      $data->charges = $req->input('charge');
      $data->payment_mode = $req->input('payment_mode');
      $data->remark =ucfirst($req->input('remark'));
      $data->save();
      $tr_data=transporter::all();
      $data=weight_entry::with('transporter')->get();
      return view('admin.view_ticket',compact('data'));
      //return view('admin.add_ticket',["transporter" => $data->toArray(),'tr_data'=>$tr_data]);

   }
  

   public function delete_ticket($sr_no){
     $data = weight_entry::find($sr_no);
     $data -> delete();
     return redirect()->route('admin.view_ticket');
   }
   

   public function show_transporter()
   {
     $sr_no = transporter::get()->last()->sr_no;
    
     return view('admin.add_ticket', ['sr_no' => $sr_no]);
        
   }


   public function add_transporter(Request $req){
     
        $data=new transporter();
    
        $data->name=$req->name;
        $data->city=$req->city;
        $data->contact=$req->contact;
        $data->remark=$req->remark;
        $data->save();
        return redirect()->back();
   }
  
}
