<?php
namespace App\Http\Controllers;
use App\Models\transporter;
use DB;
use Illuminate\Http\Request;
class client extends Controller
{
    public function show_client()
    {
        $sr_no = transporter::get()->last()->sr_no;
        $data=DB::select('select * from transporter');
        return view('admin.add_client', ['sr_no' => $sr_no],['data' => $data]);       
    }
    public function add_client(Request $req){
        $data=new transporter();
        $data->sr_no=$req->ac_no;
        $data->name=$req->name;
        $data->city=$req->city;
        $data->contact=$req->contact;
        $data->remark=$req->remark;   
        $data->save();
        return redirect()->route('add_client')->with("ok");
      }
     public function delete($id)
     {
        $data=transporter::find($id);
        $data->delete();
        return redirect()->route('add_client')->with("delete");
     }
    public function edit($id)
     {
        $data=transporter::find($id);
        return response()->json($data);
      
     }
}
