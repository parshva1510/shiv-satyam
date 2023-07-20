<?php

namespace App\Http\Controllers;
use App\Models\transporter;
use App\Models\weight_entry;
use App\Models\payment;
use DB;
use Illuminate\Http\Request;

class reportcontroller extends Controller
{
    public function reports()
   {
          $transporter=transporter::get()->all();
          $data=DB::select("SELECT *,transporter.name as tranporter_name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no ");
          return view('admin.reports',["transporter" => $transporter,"data" => $data]);
   }
   public function show_report(Request $req)
   {
        $id=$req->transporter;
       $transporter=transporter::get()->all();
       $daterange=$req->kt_daterangepicker_1;
       $date1=date('d-m-Y',strtotime(substr($daterange,0,10)));
       $date2=date('d-m-Y',strtotime(substr($daterange,13)));
       $data=DB::select("SELECT *,transporter.name as tranporter_name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where transpoter_no='$id' and cdate BETWEEN '$date1' and '$date2';");
       
       return view('admin.reports',["transporter" => $transporter,'data'=>$data]);
      
   }

   public function payment_report(){
     $transporter=transporter::get()->all();
     $payment=DB::select("SELECT p.sr_no, p.client_no, t.name AS transporter_name, p.amount, p.date, p.remark, p.payment_mode, p.receipt_no, (SELECT SUM(charges) FROM weight_entry WHERE transpoter_no = p.client_no AND cdate <= p.date) AS debit, (SELECT SUM(amount) FROM payment WHERE client_no = p.client_no AND date < p.date) AS credit, we.vehicle_no FROM payment p JOIN
     transporter t ON t.sr_no = p.client_no LEFT JOIN  weight_entry we ON we.transpoter_no = p.client_no AND we.cdate <= p.date GROUP BY p.sr_no, p.client_no, t.name, p.amount, p.date, p.remark, p.payment_mode, p.receipt_no,
     we.vehicle_no ORDER BY p.sr_no DESC;");
     

     return view('admin.payment_report',["transporter" => $transporter,'payment' => $payment]);
   }

   public function show_payment_report(Request $req){
        $id=$req->transporter;
        $transporter=DB::select("SELECT * from transporter");
        $daterange=$req->kt_daterangepicker_1;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('Y-m-d',strtotime(substr($daterange,13)));
    //dd($date2);
        $payment=DB::select("SELECT p.sr_no,p.client_no,t.name as transporter_name,p.amount,p.date,p.remark,p.payment_mode,p.receipt_no,(SELECT sum(charges) FROM weight_entry WHERE transpoter_no = p.client_no AND date <= p.date) as debit,(SELECT sum(amount) FROM payment WHERE client_no = p.client_no AND date < p.date) as credit,(SELECT vehicle_no FROM weight_entry WHERE transpoter_no = p.client_no AND cdate <= p.date LIMIT 1) as vehicle_no FROM payment p JOIN transporter t ON t.sr_no = p.client_no WHERE p.client_no = '$id' and p.date between '$date1' and '$date2' ");
        //$payment=DB::select("SELECT * from payment where client_no='$id'");
        $sr_no = payment::get()->last()->sr_no;
        $rec_no= payment::get()->last()->receipt_no;
        $temp=substr($rec_no,0,8);
        $next_rec_no= $temp . $sr_no+1;
        return view('admin.payment_report', ['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no]); 
  
   }
   
   
   public function vehicle_report()
   {
    $vehicle=DB::select("SELECT DISTINCT vehicle_no FROM weight_entry");
    $data=DB::select("SELECT *,transporter.name as name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no ");
    return view('admin.vehicle_report',["vehicle" => $vehicle,"data" => $data]);
   }
   public function show_vehicle_report(Request $req)
   {
        $id=$req->vehicle;
        $vehicle=DB::select("SELECT DISTINCT vehicle_no FROM weight_entry");
        $data=DB::select("SELECT *,transporter.name as name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where vehicle_no='$id'");
        return view('admin.vehicle_report',["vehicle" => $vehicle,"data" => $data]);
       
   }
   public function datewise_report()
   {
     $data=DB::select("SELECT *,transporter.name as name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no ");
    return view('admin.weighentry_datewise_report',["data" => $data]);
   }
   public function show_datewise_report(Request $req)
   {
        $daterange=$req->kt_daterangepicker_1;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('y-m-d',strtotime(substr($daterange,13)));
        $data=DB::select("SELECT *,transporter.name as name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where cdate BETWEEN '$date1' and '$date2'");
        return view('admin.weighentry_datewise_report',["data" => $data]);
   }

}
