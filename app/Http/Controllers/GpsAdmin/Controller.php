<?php
namespace App\Http\Controllers\GpsAdmin;
use DB;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;
use App\Models\Admin;

use App\Http\Middleware\UserAuth;
use App\Http\Middleware\AdminAuth;

use App\Models\Admin\Sales;
use App\Models\Admin\Manifacturer;
use App\Models\Admin\Users;
use Illuminate\Support\Facades\Auth;
use Session;


class Controller extends BaseController
{


    
// ************************************************************************************************************
    
public function UserDashboard(){

    $user_id=Session::get('USER_ID');


    $totalDeviceCount = Device::where('user_id','=', $user_id)->count();


        
    
    $unsoldCount=Device::where('user_id', '=', $user_id)
                           -> where('status', '=','unsold')
                           ->count();   

     $soldCount = Device::where('status', '=', 'sold')
                      ->where('user_id', '=', $user_id)
                      ->count();

         
         $allvehicle=Vechicles::with(['customer_id'])->latest()->limit(5)->get();

         $data=Sales::latest()->limit(5)->get();
         
         $Customer = Device::where('user_id', '=', $user_id)
                   ->where('customer_id', '=', 'customer_id')
                   ->latest()->limit(5)->get();

    
    
        return view("/user/Userdashboard",compact('allvehicle','Customer','data','user_id','soldCount','unsoldCount','totalDeviceCount'));

      
        }

        public function profile(){

            $user_id=Session::get('USER_ID');
            $user = Users::find($user_id);
            $username = $user->name;

            // $userimage = $user ->image;
           

        
            
            $data=Users::get();


            $totalDeviceCount = Device::where('user_id','=', $user_id)->count();
 
            $unsoldCount=Device::where('user_id', '=', $user_id)
                                   -> where('status', '=','unsold')
                                   ->count();   
    
             $soldCount = Device::where('status', '=', 'sold')
                              ->where('user_id', '=', $user_id)
                              ->count();

            return view("/profile",compact('data','user_id','username','soldCount','unsoldCount','totalDeviceCount')); 


        }




           }




