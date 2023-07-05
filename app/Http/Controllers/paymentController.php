<?php

namespace App\Http\Controllers;
use DB;
use App\Models\payment;
use App\Models\transporter;
use App\Models\weight_entry;
use Illuminate\Http\Request;

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
      return redirect()->route("add_payment");
        //return view('admin.edit_payment', ['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no,'balance'=>$balance,'id' =>$id]);
    }
    public function show_payment()
    {
        $transporter=DB::select("SELECT * from transporter");
        $payment=DB::select("SELECT p.sr_no,p.client_no,t.name as transporter_name,p.amount,p.date,p.remark,p.payment_mode,p.receipt_no,(SELECT sum(charges) from weight_entry where transpoter_no=p.client_no and cdate<=p.date) as debit,(SELECT sum(amount) from payment where client_no=p.client_no and date < p.date)as credit from payment p join transporter t on t.sr_no=p.client_no GROUP by p.sr_no order by sr_no desc;");
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
     
       $data=payment::find($id);
      //$balance= DB::select("SELECT (SELECT sum(charges) FROM `weight_entry` where transpoter_no=$id)-(SELECT sum(amount) FROM `payment` where client_no=$id) as balance");
       return $data;
    }
    public function update_payment(Request $req)
    {
       $data=payment::find(substr($req->sr_no1,8));
       $data->amount=$req->amount1;
       $data->date=$req->date1;
       $data->remark=ucfirst($req->remark1);
       $data->payment_mode=$req->payment1;
       $data->save();
       return redirect()->route('add_payment')->with("update");
    }
    public function get_transporter(Request $req)
    {
        $id=$req->transporter;
        $transporter=DB::select("SELECT * from transporter");
        $payment=DB::select("SELECT p.sr_no,p.client_no,t.name as transporter_name,p.amount,p.date,p.remark,p.payment_mode,p.receipt_no,(SELECT sum(charges) from weight_entry where transpoter_no=p.client_no and cdate <= p.date) as debit,(SELECT sum(amount) from payment where client_no=p.client_no and date <p.date)as credit from payment p join transporter t on t.sr_no=p.client_no where p.client_no='$id'");
        $balance= DB::select("SELECT (SELECT sum(charges) FROM `weight_entry` where transpoter_no=$id)-(SELECT sum(amount) FROM `payment` where client_no=$id) as balance");
        $sr_no = payment::get()->last()->sr_no;
        $rec_no= payment::get()->last()->receipt_no;
        $temp=substr($rec_no,0,8);
        $next_rec_no= $temp . $sr_no+1;
        if($payment==null)
        {
            $payment=DB::select("SELECT sum(charges) as debit,name from transporter join weight_entry on transpoter_no=transporter.sr_no  where transpoter_no='$id'");
            $balance=0;   
            return view('admin.add_payment1',['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no,'id' =>$id]);
        } 
        return view('admin.edit_payment', ['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no,'balance'=>$balance,'id' =>$id]);
    }
}
