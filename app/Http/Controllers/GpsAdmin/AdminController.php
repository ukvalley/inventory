<?php

namespace App\Http\Controllers\GpsAdmin;
use App\Http\Controllers\admin\BroadcastController; 
use Sentinel;
use Session;
use App\Http\Middleware\AdminAuth;


use App\Models\Admin;
use Illuminate\Http\Request;

use Response;
use Validator;  
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function forget_password()
    {

        return view('admin/forgot_password');
    }

    public function reset_password()
    {

        return view('admin.reset_password');
    }
    
    


    public function auth(Request $request)
    {
      $email=$request->post('email');
      $password=$request->post('password');

      $result=Admin::where(['email'=>$email,'password'=>$password])->get();
    if(isset($result['0']->id)){
        Session::put('ADMIN_LOGIN', 'yes');
        Session::put('ADMIN_ID', $result['0']->id);

        return redirect('admin/dashboard');

    }else{
        $request->session()->flash('error','Please Enter Valid Login Details');
        return redirect('admin');
        
    }
}

public function dashboard()
{

    return view('admin.dashboard');
}

public function logout()
{
    
    Session::forget('ADMIN_LOGIN');
    return redirect('/admin');
}
 

}