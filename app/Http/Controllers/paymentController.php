<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\models\payment;

class paymentController extends Controller
{
    public function add_payment(Request $req)
    {
        $data=new payment();
        $data->client_no=$req->id;
        $data->amount=$req->amount;
        $data->date=$req->date;
        $data->remark=ucfirst($req->remark);
        $data->payment_mode=$req->payment;
        $data->receipt_no=$req->sr_no;
        $data->save();
        return redirect()->route('add_payment')->with("ok");
    }
    public function show_payment()
    {
        $transporter=DB::select("SELECT * from transporter");
        $payment=DB::select("SELECT p.sr_no, p.client_no, p.amount, p.date, p.remark, p.payment_mode, p.receipt_no, (w.charges- ( SELECT SUM(p2.amount) FROM payment p2 WHERE p2.date <= p.date AND p2.client_no = p.client_no AND p2.sr_no <= p.sr_no )) AS due, t.name AS transporter_name FROM payment p JOIN weight_entry w ON w.transpoter_no = p.client_no JOIN transporter t ON t.sr_no = w.transpoter_no GROUP BY p.sr_no ORDER BY p.sr_no desc");
        $sr_no = payment::get()->last()->sr_no;
        $rec_no= payment::get()->last()->receipt_no;
        $temp=substr($rec_no,0,8);
        $next_rec_no= $temp . $sr_no+1;
        return view('admin.add_payment', ['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no]); 
    }
    public function delete_payment($id)
    {
       $data=payment::find($id);
       $data->delete();
       return redirect()->route('add_payment')->with("delete");
    }

   public function edit_payment($id)
    {
        dd("done");
       $data=payment::find($id);
       return $data;
    }
    public function update_payment(Request $req)
    {
       $data=payment::find($req->receipt_no);
       $data->remark=ucfirst($req->remark1);
       $data->save();
       return redirect()->route('add_payment')->with("update");
    }
    public function get_transporter(Request $req)
    {
        $id=$req->transporter;
        $transporter=DB::select("SELECT * from transporter");
        $payment=DB::select("SELECT p.sr_no, p.client_no, p.amount, p.date, p.remark, p.payment_mode, p.receipt_no, (w.charges - ( SELECT SUM(p2.amount) FROM payment p2 WHERE p2.date <= p.date AND p2.client_no = p.client_no AND p2.sr_no <= p.sr_no )) AS due, t.name AS transporter_name FROM payment p JOIN weight_entry w ON w.transpoter_no = p.client_no JOIN transporter t ON t.sr_no = w.transpoter_no WHERE p.client_no = '$id' GROUP BY p.sr_no ORDER BY p.sr_no desc");
        $sr_no = payment::get()->last()->sr_no;
        $rec_no= payment::get()->last()->receipt_no;
        $temp=substr($rec_no,0,8);
        $next_rec_no= $temp . $sr_no+1;
        $balance= DB::select("SELECT (SELECT sum(charges) FROM `weight_entry` where transpoter_no=$id)-(SELECT sum(amount) FROM `payment` where client_no=$id) as balance");
        return view('admin.edit_payment', ['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no,'balance'=>$balance,'id' =>$id]);
    }
}

