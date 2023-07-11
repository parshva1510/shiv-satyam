<?php

namespace App\Http\Controllers;
use App\Models\demo;
use App\Models\transporter;
use App\Models\weight_entry;
use App\Models\payment;
use App\Models\weight_entry_log;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ticket extends Controller

{
     public function index(){
          $data=weight_entry::with('transporter')->get();
          $material=DB::select("select DISTINCT material from weight_entry");
          $vehicle_no=DB::select("select DISTINCT vehicle_no from weight_entry");
          $transporter =[];
          $tr_data=Transporter::all();
          $sr_no = transporter::get()->last()->sr_no;
          $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
          return view('admin.add_ticket',["transporter" => $transporter,'sr_no' => $sr_no, 'tr_data'=>$tr_data,'ticket_no'=> $ticket_no,'data'=>$data,'material' => $material,'vehicle_no'=>$vehicle_no]);
     }
     public function add_ticket(Request $req)
     {

       
         $data = weight_entry::find($req->sr_no);
         $datainsert = new weight_entry();
        
         $sr_no = transporter::get()->last()->sr_no;
         
         $datainsert->ticket_no = $req->ticket_no;
         $datainsert->transpoter_no =$req->transpoter_no ;
         $datainsert->vehicle_no = $req->vehical_no;
         $datainsert->gross_weight = $req->gross_weight;
         $datainsert->gross_date =date('Y-m-d H:i',strtotime(substr($req->gross_date,0,10)));
         $datainsert->gross_time = date('Y-m-d H:i',strtotime($req->gross_date));
         $datainsert->tare_weight = $req->tare_wight;
         $datainsert->tare_date =date('Y-m-d',strtotime(substr($req->tare_date,0,10)));
         $datainsert->tare_time = date('Y-m-d H:i',strtotime($req->tare_date));
         $datainsert->net_weight = $req->net_weight;
         $datainsert->material =strtoupper($req->material);
         $datainsert->charges = $req->charge;
         $datainsert->payment_mode = $req->payment_mode;
         $datainsert->remark = $req->remarks;
         $datainsert->cdate = date('Y-m-d',strtotime(substr($req->cdate,0,10)));
         $datainsert->save();

         $data1 = new weight_entry_log();
         $data1->ticket_no = $req->ticket_no;
         $data1->client_no =$req->transpoter_no ;
         $data1->vehicle_no = $req->vehical_no;
         $data1->gross_weight = $req->gross_weight;
         $data1->gross_date =date('Y-m-d H:i',strtotime(substr($req->gross_date,0,10)));
         $data1->gross_time = date('Y-m-d H:i',strtotime($req->gross_date));
         $data1->tare_weight = $req->tare_wight;
         $data1->tare_date =date('Y-m-d',strtotime(substr($req->tare_date,0,10)));
         $data1->tare_time = date('Y-m-d H:i',strtotime($req->tare_date));
         $data1->net_weight = $req->net_weight;
         $data1->material =strtoupper($req->material);
         $data1->charges = $req->charge;
         $data1->payment_mode = $req->payment_mode;
         $data1->remark = $req->remarks;
         $data1->update_by = $req->update_by;
         $data1->update_date = date('Y-m-d',strtotime(substr($req->cdate,0,10)));
         $data1->save();

         $data=DB::select("SELECT *,weight_entry.remark as remarks,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no where weight_entry.sr_no = '$datainsert->sr_no'");
         $transporters = Transporter::all();
       
        $sr_no = payment::get()->last()->sr_no;
        $rec_no= payment::get()->last()->receipt_no;
        $temp=substr($rec_no,0,8);
        $next_rec_no= $temp . $sr_no+1;
        $datapayment = new payment();
        $datapayment->client_no=$req->transpoter_no;
        $datapayment->amount=$req->charge;
        $datapayment->date=$req->cdate;
        $datapayment->remark="Cash received";
        $datapayment->payment_mode="Cash";
        
        $datapayment->receipt_no=$next_rec_no;
        if($req->transpoter_no==22)
        {
          $datapayment->save();
        }
        else{
        }
        $ticket_no = $datainsert->ticket_no;
        $viewdata = DB::select("SELECT * FROM `weight_entry` ORDER BY `sr_no` DESC LIMIT 7");
        $pdf = Pdf::loadView('admin.demopdf',['viewdata'=> $viewdata,'transporter' => $data,'tr_data'=>$transporters,'sr_no' => $sr_no,'ticket_no'=> $ticket_no,'rec_no' => $next_rec_no],compact('data'))->setPaper('a4', 'portrait');
        return $pdf->stream();
        
     }

   public function view_ticket()
   {
     $data=DB::select("SELECT *,weight_entry.remark as remarks , weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no  ORDER BY weight_entry.sr_no DESC");
    // $transporters = Transporter::all();
   
      //$data=weight_entry::with('transporter')->get()->toarray();
      return view('admin.view_ticket',compact('data'));
     
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
     $material=DB::select("select DISTINCT material from weight_entry");

     //dd($data->gross_date);
     //$ticket_no = DB::table('weight_entry')->where('sr_no',$id);
    
    // $data=DB::select("SELECT *,weight_entry.remark as remarks,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no where weight_entry.sr_no = '$datainsert->sr_no'");
     $tr_data = transporter::all();
     $ticket_no =(weight_entry::get()->last()->ticket_no) +  1;
     return view('admin.edit_ticket', ["transporter" => $data, 'tr_data' => $tr_data,'sr_no' => $sr_no,'ticket_no'=> $ticket_no,'material'=> $material]);
}


   public function update_ticket(Request $req) {
     //dd($req->edit_sr_no);

      $data = weight_entry::with('transporter')->find($req->edit_sr_no);
      $data->ticket_no = $req->input('ticket_no');
      $data->transpoter_no = $req->input('transpoter_no');
      $data->vehicle_no = $req->input('vehical_no');
      $data->gross_weight = $req->input('gross_weight');
      $data->gross_date = date('Y-m-d', strtotime(substr($req->gross_date, 0, 10)));
      $data->gross_time = date('Y-m-d H:i', strtotime($req->gross_date));
      $data->tare_weight = $req->input('tare_wight');
      $data->tare_date =date('Y-m-d',strtotime(substr($req->tare_date,0,10)));
      $data->tare_time = date('Y-m-d H:i',strtotime($req->tare_date));
      $data->net_weight = $req->input('net_weight');
      $data->material = strtoupper($req->input('material'));
      $data->charges = $req->input('charge');
      $data->payment_mode = $req->input('payment_mode');
      $data->cdate =date('Y-m-d',strtotime(substr($req->cdate,0,10)));
      $data->remark =ucfirst($req->input('remarks'));
      $data->save();

      $dataupdate = new weight_entry_log();
      $dataupdate->ticket_no = $req->ticket_no;
      $dataupdate->client_no =$req->transpoter_no ;
      $dataupdate->vehicle_no = $req->vehical_no;
      $dataupdate->gross_weight = $req->gross_weight;
      $dataupdate->gross_date =date('Y-m-d H:i',strtotime(substr($req->gross_date,0,10)));
      $dataupdate->gross_time = date('Y-m-d H:i',strtotime($req->gross_date));
      $dataupdate->tare_weight = $req->tare_wight;
      $dataupdate->tare_date =date('Y-m-d',strtotime(substr($req->tare_date,0,10)));
      $dataupdate->tare_time = date('Y-m-d H:i',strtotime($req->tare_date));
      $dataupdate->net_weight = $req->net_weight;
      $dataupdate->material =strtoupper($req->material);
      $dataupdate->charges = $req->charge;
      $dataupdate->payment_mode = $req->payment_mode;
      $dataupdate->remark = $req->remarks;
      $dataupdate->update_by = $req->update_by;
      $dataupdate->update_date = date('Y-m-d',strtotime(substr($req->cdate,0,10)));
      $dataupdate->save();



      $tr_data=transporter::all();
      $data=DB::select("SELECT *,weight_entry.remark as remarks ,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no  ORDER BY weight_entry.sr_no DESC");
      return view('admin.view_ticket',['data' => $data]);
     // return view('admin.add_ticket',['data' => $data,'tr_data'=>$tr_data]);
// aa to tu select karavas update ma kya ? aa select 6 edit ni kya ?

   }
  

   public function delete_ticket($id){
   
    $data = weight_entry::with('transporter')->find($id);
    $data->delete();
    return redirect()->route('view_ticket');
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
