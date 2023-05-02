<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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



class DashboardController extends Controller
{
    
    public function Dashboard(){

        $admin_id=Session::get('ADMIN_ID');

    
//Sold/Unsold
    $soldCount=Device::where('status', '=','sold')->count();
    $unsoldCount=Device::where('status', '=','unsold')->count();

//Total Device
    $totalDeviceCount= Device::where('ice_id', '<>','ice_id')->count();
//Purchase Device
    // $purchaseCount=Purchase::where('id', '<>','id')->count();
//
    $customerCount=Customer::where('id', '<>','id')->count();

    $salesAgentCount=Users::where('user_type', '=','sales_agent')->count();
    $technicianCount=Users::where('user_type', '=','technician')->count();


    $vehicleCount=Vechicles::where('id', '<>','id')->count();

    $manifacturerCount=Manifacturer::where('id', '<>','id')->count();

    //
    $allvehicle=Vechicles::with(['customer_id'])->latest()->limit(5)->get();
    $data=Sales::latest()->limit(5)->get();
    $allcustomer=Customer::latest()->limit(5)->get();

   
   
       




  return view("/admin/dashboard",compact('admin_id','data','allcustomer','customerCount','vehicleCount','allvehicle','soldCount','unsoldCount','salesAgentCount','technicianCount','totalDeviceCount','manifacturerCount'));

  
    }

            public function adminprofile(){

                $admin_id=Session::get('ADMIN_ID');
                $admin = Admin::find($admin_id);
                $adminname = $admin->name;

                 
            

               

            
                
                $data=Admin::get();


                $totalDeviceCount = Device::where('ice_id','=','ice_id')->count();
     
                $unsoldCount=Device::where('status', '=','unsold')
                                       ->count();   
        
                 $soldCount = Device::where('status', '=', 'sold')
                                      ->count();

                return view("/adminprofile",compact('adminname','data','admin_id','soldCount','unsoldCount','totalDeviceCount')); 


            }


}
