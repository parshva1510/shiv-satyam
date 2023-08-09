<?php

namespace App\Http\Controllers;
use App\Models\transporter;
use App\Models\weight_entry;
use App\Models\payment;
use App\Models\ledger;
use DB;
use Illuminate\Http\Request;

class reportcontroller extends Controller
{
    public function reports()
   {
     $transporter=transporter::get()->all();
     $daterange=Date('d-m-Y')." - " .Date('d-m-Y') ;
     $id =0;
     $data=DB::select("SELECT *,transporter.name as tranporter_name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where cdate=CURRENT_DATE");
     $total_charges=DB::select("SELECT sum(charges) as total FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no and cdate=CURRENT_DATE");
     return view('admin.reports',["transporter" => $transporter,"data" => $data,'id'=>$id,'daterange' => $daterange,'total_charges'=> $total_charges]);
   }

   public function show_report(Request $req)
   {
     $id=$req->transporter;
     $transporter=transporter::get()->all();
     $daterange=$req->kt_daterangepicker_1;
     $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
     $date2=date('Y-m-d',strtotime(substr($daterange,13)));
     $data=DB::select("SELECT *,transporter.name as tranporter_name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where transpoter_no='$id' and weight_entry.cdate BETWEEN '$date1' and '$date2'");
     $total_charges=DB::select("SELECT sum(charges) as total FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where transpoter_no='$id' and weight_entry.cdate BETWEEN '$date1' and '$date2'");
     return view('admin.reports', ["transporter" => $transporter, 'data' => $data, 'id' => $id, 'daterange' => $daterange,'total_charges'=> $total_charges]);      
   }

   public function payment_report(Request $req){
     $daterange=Date('d-m-Y')." - " .Date('d-m-Y') ;
     $id=$req->transporter;
     $transportername = transporter::where('sr_no',$id)->first();
     $transporter=DB::select("SELECT * from transporter");
   //$updatedLedgerEntries = DB::select("SELECT t_index, transporter_id, credit, debit, date, receipt, description, CASE WHEN receipt IS NOT NULL THEN ( SELECT COALESCE(SUM(debit - credit), 0) FROM ledger AS inner_ledger WHERE inner_ledger.transporter_id = outer_ledger.transporter_id AND inner_ledger.t_index < outer_ledger.t_index ) - credit ELSE SUM(debit - credit) OVER (PARTITION BY transporter_id ORDER BY t_index) END AS remaining FROM ledger AS outer_ledger WHERE transporter_id = $id"); 
   // Assuming $ledgerEntries is the collection of entries from your database with transporter_id = 77.
     $ledgerEntries = ledger::where('transporter_id', $id)->orderBy('t_index')->get();
     $totalvalues = DB::select("SELECT sum(credit)as totalcredit, sum(debit) as totaldebit from ledger where transporter_id='$id'");
   //dd($totalvalues);
     $lastEntry = end($ledgerEntries);
     $sr_no = payment::get()->last()->sr_no;
     $rec_no= payment::get()->last()->receipt_no;
     $temp=substr($rec_no,0,8);
     $next_rec_no= $temp . $sr_no+1;
   //dd($lastEntry);
   //$ledgerEntries = ledger::where('transporter_id', $id)->orderBy('t_index')->get();
   //$updatedLedgerEntries = calculateRemaining($ledgerEntries);
     return view('admin.payment_report', ['ledger'=>$ledgerEntries,'transporter' => $transporter,'lastentry'=>$lastEntry,'name'=>$transportername,'nextrcpt'=>$next_rec_no,'id'=>$id,'totalvalues'=>$totalvalues,'id'=>$id,'daterange'=>$daterange]); 
   }

   public function show_payment_report(Request $req){
     $id=$req->transporter;
     $transportername = transporter::where('sr_no',$id)->first();
     $transporter=DB::select("SELECT * from transporter");
   //$updatedLedgerEntries = DB::select("SELECT t_index, transporter_id, credit, debit, date, receipt, description, CASE WHEN receipt IS NOT NULL THEN ( SELECT COALESCE(SUM(debit - credit), 0) FROM ledger AS inner_ledger WHERE inner_ledger.transporter_id = outer_ledger.transporter_id AND inner_ledger.t_index < outer_ledger.t_index ) - credit ELSE SUM(debit - credit) OVER (PARTITION BY transporter_id ORDER BY t_index) END AS remaining FROM ledger AS outer_ledger WHERE transporter_id = $id"); 
   // Assuming $ledgerEntries is the collection of entries from your database with transporter_id = 77.
     $ledgerEntries = ledger::where('transporter_id', $id)->orderBy('t_index')->get();
     $totalvalues = DB::select("SELECT sum(credit)as totalcredit, sum(debit) as totaldebit from ledger where date=CURRENT_DATE");
   //dd($totalvalues);
     $lastEntry = end($ledgerEntries);
     $sr_no = payment::get()->last()->sr_no;
     $rec_no= payment::get()->last()->receipt_no;
     $temp=substr($rec_no,0,8);
     $next_rec_no= $temp . $sr_no+1;
   //dd($lastEntry);
   //$ledgerEntries = ledger::where('transporter_id', $id)->orderBy('t_index')->get();
   //$updatedLedgerEntries = calculateRemaining($ledgerEntries);
     $daterange=$req->kt_daterangepicker_1;
     $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
     $date2=date('y-m-d',strtotime(substr($daterange,13)));
     return view('admin.payment_report', ['ledger'=>$ledgerEntries,'transporter' => $transporter,'lastentry'=>$lastEntry,'name'=>$transportername,'nextrcpt'=>$next_rec_no,'id'=>$id,'totalvalues'=>$totalvalues,'id'=>$id,'daterange'=>$daterange]); 
   }
   
   public function vehicle_report()
   {
     $id=0;
     $vehicle=DB::select("SELECT DISTINCT vehicle_no FROM weight_entry");
     $data=DB::select("SELECT *,transporter.name as name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where cdate=CURRENT_DATE ");
     $total_charges=DB::select("SELECT sum(charges) as total FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where cdate=CURRENT_DATE ");
     return view('admin.vehicle_report',["vehicle" => $vehicle,"data" => $data,'id'=>$id,'total_charges'=> $total_charges]);  
   }

   public function show_vehicle_report(Request $req)
   {
     $id=$req->vehicle;
     $vehicle=DB::select("SELECT DISTINCT vehicle_no FROM weight_entry");
     $data=DB::select("SELECT *,transporter.name as name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where vehicle_no='$id'");
     $total_charges=DB::select("SELECT sum(charges) as total,vehicle_no from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where vehicle_no='$id'");
     //dd($id );
     return view('admin.vehicle_report',["vehicle" => $vehicle,"data" => $data,'id'=>$id,'total_charges'=> $total_charges]);       
   }
   public function datewise_report()
   {
     $data=DB::select("SELECT *,transporter.name as name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where cdate=CURRENT_DATE ");
     $daterange=Date('d-m-Y')." - " .Date('d-m-Y') ;
     $total_cash=DB::select("SELECT sum(charges) as 'Total' from weight_entry where  payment_mode='1' and cdate=CURRENT_DATE ");
     $total_credit=DB::select("SELECT sum(charges) as 'Total' from weight_entry where payment_mode='2' and cdate=CURRENT_DATE ");
    return view('admin.weighentry_datewise_report',["data" => $data,'daterange'=>$daterange,'total_cash'=> $total_cash,'total_credit' => $total_credit]);
   }
   
   public function show_datewise_report(Request $req)
   {
     $daterange=$req->kt_daterangepicker_1;
     $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
     $date2=date('y-m-d',strtotime(substr($daterange,13)));
     $data=DB::select("SELECT *,transporter.name as name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where cdate BETWEEN '$date1' and '$date2' order by cdate");
     $total_cash=DB::select("SELECT sum(charges) as 'Total' from weight_entry where cdate BETWEEN '$date1' and '$date2' and payment_mode='1' order by cdate;");
     $total_credit=DB::select("SELECT sum(charges) as 'Total' from weight_entry where cdate BETWEEN '$date1' and '$date2' and payment_mode='2' order by cdate;");
     return view('admin.weighentry_datewise_report',["data" => $data,'daterange'=>$daterange,'total_cash'=> $total_cash,'total_credit' => $total_credit]);
   }

}
