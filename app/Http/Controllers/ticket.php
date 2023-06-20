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
          return view('admin.add_ticket',["transporter" => $transporter,'sr_no' => $sr_no, 'tr_data'=>$tr_data]);
     }
     public function add_ticket(Request $req)
     {
       
         $data = weight_entry::find($req->sr_no);
         $datainsert = new weight_entry();
        //  dd($req->edit_sr_no);
   
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
     
         return view('admin.add_ticket', ["transporter" => $data,'tr_data'=>$transporters]);
     }

   public function view_ticket()
   {
     $transporters = Transporter::all();
    $data=weight_entry::with('transporter')->get();
    //$data = DB::select('select * from weight_entry ORDER BY sr_no DESC');
     return view('admin.view_ticket',compact('data'));
     
   }

   public function edit_ticket(Request $req,$ticket_no)
   {
     
     $data = weight_entry::find($ticket_no);
     //dd($ticket_no);
     //$data->vehicle_no = $req->vehical_no;
     $sr_data = DB :: select('SELECT name FROM transporter WHERE sr_no=1');
     $tr_data=Transporter::all();
     //$data->update();
     return view('admin.add_ticket',["transporter" => $data->toArray(),'tr_data'=>$tr_data]);
     
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
