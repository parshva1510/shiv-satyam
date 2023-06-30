<?php

namespace App\Http\Controllers;
use App\Models\demo;
use App\Models\transporter;
use App\Models\weight_entry;
use App\Models\weight_entry_log;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ticket extends Controller

{
     public function index(){
       $data=weight_entry::with('transporter')->get();
          // $data=DB::select("SELECT * from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no");
          $transporter =[];
          $tr_data=Transporter::all();
          $sr_no = transporter::get()->last()->sr_no;
          $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
          //$payment = payment::select('client_no')->get();
       

          return view('admin.add_ticket',["transporter" => $transporter,'sr_no' => $sr_no, 'tr_data'=>$tr_data,'ticket_no'=> $ticket_no,'data'=>$data]);
     }
     public function add_ticket(Request $req)
     {

       
         $data = weight_entry::find($req->sr_no);
         $datainsert = new weight_entry();
         $sr_no = transporter::get()->last()->sr_no;
         $datainsert->date = $req->date;
         $datainsert->ticket_no = $req->ticket_no;
         $datainsert->transpoter_no = strtoupper( $req->transpoter_no) ;
         $datainsert->vehicle_no = $req->vehical_no;
         $datainsert->gross_weight = $req->gross_weight;
         $datainsert->gross_date = $req->gross_date;
         $datainsert->gross_time = date('Y-m-d H:i:s',strtotime($req->gross_date));
         $datainsert->tare_weight = $req->tare_wight;
         $datainsert->tare_date = $req->tare_date;
         $datainsert->tare_time = date('Y-m-d H:i:s',strtotime($req->tare_date));
         $datainsert->net_weight = $req->net_weight;
         $datainsert->material =strtoupper($req->material);
         $datainsert->charges = $req->charge;
         $datainsert->payment_mode = $req->payment_mode;
         $datainsert->remark = $req->remark;
         $datainsert->save();
         $transporters = Transporter::all();
        //  $ticket_no =(weight_entry::get()->last()->datainsert()->ticket_no) +  1;
        $ticket_no = $datainsert->ticket_no;

         $data=DB::select("SELECT *,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no where weight_entry.sr_no = '$datainsert->sr_no'");
         $viewdata = DB::select("SELECT * FROM `weight_entry` ORDER BY `sr_no` DESC LIMIT 7");
         $pdf = Pdf::loadView('admin.demopdf',['viewdata'=> $viewdata,'transporter' => $data,'tr_data'=>$transporters,'sr_no' => $sr_no,'ticket_no'=> $ticket_no],compact('data'))->setPaper('a4', 'portrait');
         return $pdf->stream();
        
     }

   public function view_ticket()
   {
     $data=DB::select("SELECT *,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no");
    // $transporters = Transporter::all();
    $viewdata = DB::select("SELECT * FROM `weight_entry` ORDER BY `sr_no` DESC LIMIT 7");
      //$data=weight_entry::with('transporter')->get()->toarray();
      return view('admin.view_ticket',['viewdata'=> '$viewdata'],compact('data'));
     
   }
   public function client()
   {
     $data=transporter::get()->all();
      return view('admin.add_client');
   }

   public function edit_ticket($id)
{
     $sr_no = transporter::get()->last()->sr_no;
     $data = weight_entry::with('transporter')->find($id);
     //$ticket_no = DB::table('weight_entry')->where('sr_no',$id);
    // $data=DB::select("SELECT *,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no");
     $tr_data = transporter::all();
     $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
     return view('admin.add_ticket', ["transporter" => $data, 'tr_data' => $tr_data,'sr_no' => $sr_no,'ticket_no'=> $ticket_no]);
}


   public function update_ticket(Request $req) {
     //dd($req->edit_sr_no);
      $data = weight_entry::with('transporter')->find($req->edit_sr_no);
      $data->ticket_no = $req->input('ticket_no');
      $data->transpoter_no = $req->input('transpoter_no');
      $data->vehicle_no = $req->input('vehical_no');
      $data->gross_weight = $req->input('gross_weight');
      $data->gross_date = $req->input('gross_date');
      $data->tare_weight = $req->input('tare_wight');
      $data->tare_date = $req->input('tare_date');
      $data->net_weight = $req->input('net_weight');
      $data->material = strtoupper($req->input('material'));
      $data->charges = $req->input('charge');
      $data->payment_mode = $req->input('payment_mode');
      $data->date = $req->input('date');
      $data->remark =ucfirst($req->input('remark'));
      $data->save();
      $tr_data=transporter::all();
      $data=DB::select("SELECT *,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no");
      return view('admin.view_ticket',['data' => $data]);
     // return view('admin.add_ticket',['data' => $data,'tr_data'=>$tr_data]);

   }
  

   public function delete_ticket($id){
    $data = weight_entry::find($id);
    if ($data){
      $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
      $data -> delete();
      return view('admin.view_ticket',['data' => $data,'ticket_no'=> $ticket_no]);
     } else 
     {
        return response('Record not found', 404);
    }
}


   public function show_transporter()
   {
     $sr_no = transporter::get()->last()->sr_no;
    
     return view('admin.add_ticket', ['sr_no' => $sr_no]);
        
   }


   public function add_transporter(Request $req){
     
        $data=new transporter();
    
        $data->name=strtoupper($req->name);
        $data->city=$req->city;
        $data->contact=$req->contact;
        $data->remark=ucfirst($req->remark);
        $data->save();
        return redirect()->back();
   }
  
}
