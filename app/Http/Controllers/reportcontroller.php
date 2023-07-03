<?php

namespace App\Http\Controllers;
use App\Models\transporter;
use App\Models\weight_entry;
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
   public function transporter_report()
   {
    $transporter=transporter::get()->all();
    $data=weight_entry::get()->all();
    return view('admin.transporter_report',["transporter" => $transporter,"data" => $data]);
   }
   public function show_transporter_report(Request $req)
   {
       $id=$req->transporter;
       $transporter=transporter::get()->all();
       $data=DB::select("SELECT *,transporter.name as transporter_name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where transpoter_no='$id'");
       return view('admin.transporter_report',["transporter" => $transporter,'data'=>$data]);
   }
   public function vehicle_report()
   {
    $vehicle=DB::select("SELECT DISTINCT vehicle_no FROM weight_entry");
    $data=weight_entry::get()->all();
    return view('admin.vehicle_report',["vehicle" => $vehicle,"data" => $data]);
   }
   public function show_vehicle_report(Request $req)
   {
          
        $id=$req->vehicle;
        $vehicle=DB::select("SELECT DISTINCT vehicle_no FROM weight_entry");
        $data=DB::select("SELECT *,transporter.name as transporter_name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where vehicle_no='$id'");
        return view('admin.vehicle_report',["vehicle" => $vehicle,"data" => $data]);
   }
   public function datewise_report()
   {
    $data=weight_entry::get()->all();
    return view('admin.weighentry_datewise_report',["data" => $data]);
   }
   public function show_datewise_report(Request $req)
   {
        $daterange=$req->kt_daterangepicker_1;
        $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
        $date2=date('y-m-d',strtotime(substr($daterange,13)));
        $data=DB::select("SELECT *,transporter.name as transporter_name from transporter join weight_entry on transporter.sr_no=weight_entry.transpoter_no where cdate BETWEEN '$date1' and '$date2'");
        return view('admin.weighentry_datewise_report',["data" => $data]);
   }

}
