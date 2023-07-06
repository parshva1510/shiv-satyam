<?php

use App\Models\payment;

function getPaymentdetails($id){

    $details = payment::where('client_no',$id)->get();

    return $details;

}