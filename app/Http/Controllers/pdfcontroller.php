<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\transporter;
use App\Models\weight_entry;
use DB;

class pdfcontroller extends Controller
{
    public function generatepdf($id)
    {
        
         $data=DB::select("SELECT *,weight_entry.sr_no as id from weight_entry JOIN transporter on transporter.sr_no=weight_entry.transpoter_no where weight_entry.ticket_no = '$id'");
         $viewdata = DB::select("SELECT * FROM `weight_entry` ORDER BY `sr_no` DESC LIMIT 7");
      
    $pdf = Pdf::loadView('admin.demopdf',['viewdata'=> $viewdata],compact('data'))->setPaper('a4', 'portrait');
    return $pdf->stream();
    }
}