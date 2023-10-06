<?php
namespace App\Http\Controllers;
use App\Models\transporter;
use DB;
use Validator;
use Illuminate\Http\Request;
class client extends Controller
{
    public function show_client()
    {
        $data=DB::select('select * from transporter ORDER BY transporter.sr_no DESC');
        if($data==NULL)
        {
            $sr_no=0;
        }else
        {
            $sr_no = transporter::get()->last()->sr_no;
        }
       
        return view('admin.add_client', ['sr_no' => $sr_no],['data' => $data]);       
    }
    public function add_client(Request $req)
    {
        $data=new transporter();
        $req->validate(
            [
                'name' => 'required',
                'city' => 'required',
                'contact'=>'required',
            ],
        );
        $data->name=strtoupper($req->name);
        $data->city=strtoupper($req->city);
        $data->contact=$req->contact;
        $data->remark=ucfirst($req->remark);   
        $data->save();
        return redirect()->route('add_client')->with("ok");
      }
     public function delete_client($id)
     {
        $data=transporter::find($id);
        $data->delete();
        return redirect()->route('add_client')->with("delete");
     }
    public function edit_client($id)
     {
        $data=transporter::find($id);
        return $data;
     }
     public function update_client(Request $req)
     {
        $data=transporter::find(substr($req->ac_no1,2));
        $data->name=strtoupper($req->name1);
        $data->city=strtoupper($req->city1);
        $data->contact=$req->contact1;
        $data->remark=ucfirst($req->remark1);
        $data->save();
        return redirect()->route('add_client')->with("update");
     }
   
}
