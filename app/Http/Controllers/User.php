<?php

namespace App\Http\Controllers;
use App\Models\users;
use DB;
use Illuminate\Http\Request;

class User extends Controller
{
    public function show_user()
    {
        $id = users::get()->last()->id;
        $data=DB::select('select * from users');
        return view('admin.add_user',['user' => $data],['id' => $id]);   
    }
    public function add_user(Request $req)
    {
        $data=new users();
            $data->username=$req->username;
            $data->password=md5($req->password);
            $data->f_name=strtoupper($req->f_name);
            $data->contact=$req->contact;
            $data->role=strtoupper($req->role);
            $data->save();  
            return redirect()->route('add_user')->with("Add");
    }
    public function delete_user($id)
    {
        $data = users::find($id);
        $data -> delete();
        return redirect() -> route('add_user') -> with("Delete");
    }
    public function edit_user($id)
    {
       $data=users::find($id);
       return $data;
    }
    public function update_user(Request $req)
    {
       $data=users::find($req->id1);
       if($data->password==$req->password1)
       {
        $data->f_name=strtoupper($req->f_name1);
        $data->contact=$req->contact1;
        $data->role=ucfirst($req->role1);
        $data->save();
        return redirect()->route('add_user')->with("update");
       }else{
        Session()->flash('message', 'Login Failed!');
        return redirect('add_user')->with("fail","Wrong Old Password");
       }
    
    }


    public function tetsing(){
        return view('admin.test');
    }

}
