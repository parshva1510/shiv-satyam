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
          $data=weight_entry::get()->all();
          return view('admin.reports',["transporter" => $transporter,"data" => $data]);
   }
   public function show_report(Request $req)
   {
       $id=$req->transporter;
       $transporter=transporter::get()->all();
       $daterange=$req->kt_daterangepicker_1;
       $date1=date('Y-m-d',strtotime(substr($daterange,0,10)));
       $date2=date('y-m-d',strtotime(substr($daterange,13)));
       $data=DB::select("SELECT *,transporter.name as tranporter_name FROM `weight_entry`join transporter on transporter.sr_no=weight_entry.transpoter_no where transpoter_no='$id' and date BETWEEN '$date1' and '$date2';");
       return view('admin.reports',["transporter" => $transporter,'data'=>$data]);
   }

}
