<?php

namespace App\Http\Controllers\GpsAdmin;
use DB;
use Illuminate\Http\Request;
use PDF;
use load;
use Sentinel;
use Session;
use App\Http\Middleware\UserAuth;

use Response;
use Validator;  
use Hash;
use App\Models\Admin\Users;



class UserController extends Controller
{   
   ///user/staff login Start-------------------------------------------

   public function index()
   {

       return view('user.login');
   }

  
   


   public function auth(Request $request){

     $email=$request->post('email');
     $password=$request->post('password');

     $result=Users::where(['email'=>$email,'password'=>$password])->get();
   if(isset($result['0']->id)){
       Session::put('USER_LOGIN', 'yes');
       Session::put('USER_ID', $result['0']->id);
       return redirect('user/Userdashboard');

   }else{

       $request->session()->flash('error','Please Enter Valid Login Details');
       return redirect('user');
       
   }



  



}




public function Userdashboard()
{

   return view('user.Userdashboard');
}

public function logout()
   
{
   
   Session::forget('USER_LOGIN');
   return redirect('/user');
}


   ///user/staff login End--------------------------------------------------


   
   

public function  UserRegister(Request $request)
{
                
         $request->validate(
            [
                 'name'=>'required',
                 'email'=>'required',
                 'mobile'=>'required|digits_between:10,10|unique:Users',
                 'city'=>'required',
                 'basic_amount'=>'required',
                 'user_type'=>'required',
                 ]
            );
  
       
	         

	          
	     	
	        $User = new Users;	

	 
	        $User->name = $request->input('name');
           $User->email = $request->input('email');

	        $User->mobile = $request->input('mobile');
	        $User->city = $request->input('city');	
	        $User->admiko_parent_child = $request->input('admiko_parent_child');
	        $User->basic_amount = $request->input('basic_amount');
	        $User->user_type = $request->input('user_type');
	        

	        $User->save();
	        	

	              
             return redirect('/user/user_table');
	        	
	        	}
            
	    public function view_user()
   {
      $data=Users::get();

      //print_r($data); die();



      //get data from database 
      return view('user/user_table')->with(compact('data')); 
   }


   public function register_user()
    {    
        
        $allusers = Users::get();

        // print_r($data); die();
         return view('/user/register_user')->with(compact('allusers'));
    }


   public function user_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('users')
               ->where('id',"=",$id)
               ->first();

        $allusers = Users::get();

        // print_r($data); die();
         return view('/user/user_edit')->with(compact('data','allusers'));
    }


	     

		public function user_update($id,Request $request)
    	{
          
           $data = $request->all();
               $users = Users::find($id);
	        
              
          $users->name =$request->input('name');
	        $users->mobile = $request->input('mobile');
	        $users->city = $request->input('city');
	        $users->admiko_parent_child = $request->input('admiko_parent_child');
	        $users->basic_amount = $request->input('basic_amount');
	        $users->user_type =$request->input('user_type');


	         



	        $users->update($data);
 			

 			 return redirect()->back();
 

    }


 public function user_destroy()
    {
      $id =$_GET['id'];
         $data=DB::table('users')
               ->where('id',"=",$id)
               ->delete();
                
    
        return redirect()->back();
    }


    
   public function openUserInfo()
   {    
        $id =$_GET['id'];
        $data=DB::table('users')
              ->where('id',"=",$id)
              ->first();

       $allusers = Users::get();

       // print_r($data); die();
        return view('user_info')->with(compact('data','allusers'));
   }
   
public function pdfview_user(Request $request)  
{  
  $user = Users::all();
  $data = [
     'title' => 'Welcome to CodeSolutionStuff.com',
     'date' => date('m/d/Y'),
     'user' => $user
 ];
   
 $pdf = PDF::loadView('user.userpdf', $data);

 return $pdf->download('userpdf.pdf');
}  







}
