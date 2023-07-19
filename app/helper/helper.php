<?php

use App\Models\payment;
use App\Models\weight_entry;


function getTicketdetails($id){

    $details = weight_entry::where('transpoter_no',$id)->get();
    

    return $details;
}

function getPayment($id){

    $payment=DB::select("SELECT p.sr_no,p.client_no,t.name as transporter_name,p.amount,p.date,p.remark,p.payment_mode,p.receipt_no,(SELECT sum(charges) from weight_entry where transpoter_no=p.client_no and cdate <= p.date) as debit,(SELECT sum(amount) from payment where client_no=p.client_no and date <p.date)as credit from payment p join transporter t on t.sr_no=p.client_no where p.client_no='$id' order by date");
    

    return $payment;
}
