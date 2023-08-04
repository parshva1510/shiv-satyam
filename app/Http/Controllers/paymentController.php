<?php

namespace App\Http\Controllers;

use App\Models\ledger;
use App\Models\payment;
use App\Models\transporter;
use App\Models\weight_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentController extends Controller
{
    public function add_payment(Request $req)
    {
        $data=new payment();
        $data->client_no=$req->id;
        $data->amount=$req->amount;
        $data->date=Date("Y-m-d",strtotime($req->date));
        $data->remark=ucfirst($req->remark);
        $data->payment_mode=$req->payment;
        $data->receipt_no=$req->sr_no;
        $data->save();
        //Payment entry in Ledger
        $paymententryinledger = new ledger();
        $paymententryinledger->transporter_id = $req->id;
        $paymententryinledger->credit = $req->amount;
        $paymententryinledger->debit = 0;
        $paymententryinledger->date = Date("Y-m-d",strtotime($req->date));
        $paymententryinledger->receipt = $req->sr_no;
        $paymententryinledger->description = ucfirst($req->remark);
        $paymententryinledger->save();

      return back()->with('sucess','Payment Added');
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
       return back()->with("update");
    }
    // public function get_transporter(Request $req)
    // {
    //     $id=$req->transporter;
      
    //     $transporter=DB::select("SELECT * from transporter");
    //     $payment=DB::select("SELECT p.sr_no,p.client_no,t.name as transporter_name,p.amount,p.date,p.remark,p.payment_mode,p.receipt_no,(SELECT sum(charges) from weight_entry where transpoter_no=p.client_no and cdate <= p.date) as debit,(SELECT sum(amount) from payment where client_no=p.client_no and date <p.date)as credit from payment p join transporter t on t.sr_no=p.client_no where p.client_no='$id'");
    //     $transporter_name = DB::select("SELECT name FROM transporter where sr_no='$id'"); 
    //     $count=DB::select("SELECT count(*) as count from payment where client_no='$id'");
    //     $balance= DB::select("SELECT (SELECT sum(charges) FROM `weight_entry` where transpoter_no=$id)-(SELECT sum(amount) FROM `payment` where client_no=$id) as balance");
    //     $sr_no = payment::get()->last()->sr_no;
    //     $rec_no= payment::get()->last()->receipt_no;
    //     $temp=substr($rec_no,0,8);
    //     $next_rec_no= $temp . $sr_no+1;
    //     if($payment==null)
    //     {
    //         $payment=DB::select("SELECT sum(charges) as debit,name from transporter join weight_entry on transpoter_no=transporter.sr_no  where transpoter_no='$id'");
    //         $balance=0;   
    //         return view('admin.add_payment1',['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no,'id' =>$id]);
    //     } 
    //     return view('admin.edit_payment', ['transporter' => $transporter,'payment' => $payment,'sr_no' => $sr_no ,'rec_no' => $next_rec_no,'balance' => $balance,'id' =>$id,'count' => $count,'transporter_name'=>$transporter_name]);
    // }

    public function get_transporter(Request $req)
    {
        $id=$req->transporter;
        $transportername = transporter::where('sr_no',$id)->first();
        $transporter=DB::select("SELECT * from transporter");

    
      //$updatedLedgerEntries = DB::select("SELECT t_index, transporter_id, credit, debit, date, receipt, description, CASE WHEN receipt IS NOT NULL THEN ( SELECT COALESCE(SUM(debit - credit), 0) FROM ledger AS inner_ledger WHERE inner_ledger.transporter_id = outer_ledger.transporter_id AND inner_ledger.t_index < outer_ledger.t_index ) - credit ELSE SUM(debit - credit) OVER (PARTITION BY transporter_id ORDER BY t_index) END AS remaining FROM ledger AS outer_ledger WHERE transporter_id = $id"); 


   
      
      
      // Assuming $ledgerEntries is the collection of entries from your database with transporter_id = 77.
      $ledgerEntries = ledger::where('transporter_id', $id)->orderBy('t_index')->get();

      $totalvalues = DB::select("SELECT sum(credit)as totalcredit, sum(debit) as totaldebit from ledger where transporter_id=$id");

      //dd($totalvalues);

      $lastEntry = end($ledgerEntries);
      $sr_no = payment::get()->last()->sr_no;
      $rec_no= payment::get()->last()->receipt_no;
      $temp=substr($rec_no,0,8);
      $next_rec_no= $temp . $sr_no+1;
      //dd($lastEntry);
      //$ledgerEntries = ledger::where('transporter_id', $id)->orderBy('t_index')->get();
      //$updatedLedgerEntries = calculateRemaining($ledgerEntries);
      return view('admin.edit_payment',['ledger'=>$ledgerEntries,'transporter' => $transporter,'lastentry'=>$lastEntry,'name'=>$transportername,'nextrcpt'=>$next_rec_no,'id'=>$id,'totalvalues'=>$totalvalues]);
      //dd($updatedLedgerEntries);
    }

    public function get_paymentdetails($id1,$id2)
    {
      $recpt = $id1.'/'.$id2;
      $data = ledger::where('receipt',$recpt)->get();
      //dd($data);
      return response()->json($data);
    }


    public function edit_thepayment(Request $req)
    {
      $updatedata = ledger::where('receipt',$req->Receipt_1)->update(
        [
          'credit'=>$req->amount123,
          'date'=>$req->date12
        ]
      );

      $paymentableupdate = payment::where('receipt_no',$req->Receipt_1)->update(
        [
          'amount'=>$req->amount123,
          'date'=>$req->date12
        ]
      );

      return back()->with('done','Updated Sucessfully!');
    }


}
