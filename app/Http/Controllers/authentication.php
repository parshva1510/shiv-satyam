<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
use DB;
class authentication extends Controller
{
    public function login()
    {
     return view('login');
    }
    public function check_user(Request $req)
    {
        $username=$req->username;
        $password=md5($req->password);
        $check=$req->remember;
        $data=DB::select("SELECT * FROM `users` where username like '$username'");
        if($data==null){
        
                Session()->flash('message', 'Login Failed!');
                return redirect("login")->with("fail","Login Failed");
        }else{
            if($password==$data[0]->password){
                $_SESSION['type']="remember";
                session(['user'=>$username]);
                session(['role'=>$data[0]->role]);
                if($check==null){
                    if(isset($_COOKIE['user_login'])){
                        setcookie('user_login',"");
                        if(isset($_COOKIE['user_password'])){
                            setcookie('user_password',"");
                        }
                    }
               }else{
                    //COOKIES for username
                    setcookie("test_cookie", "test", time() + 3600, '/');
                    setcookie("user_login", $_POST['username'], strtotime('+30 days'));
                    //COOKIES for password
                    setcookie("user_password", $_POST['password'], strtotime('+30 days'));
                }
                Session()->flash('message', 'Login succssesful');
                return redirect()->route('view_ticket');
               }else{
                Session()->flash('message', 'Login Failed!');
                return redirect("login")->with("fail","Login Failed");
               }
            }
        }
    public function destroy()
    {
        session()->forget('user');
        session()->forget('role');
        return view('login');
    }
}



