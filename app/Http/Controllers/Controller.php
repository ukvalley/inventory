<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;

use App\Models\Admin\Sales;
use App\Models\Admin\Manifacturer;


use App\Models\Admin\Users;




class Controller extends BaseController
{
    public function Dashboard(){
    
//Sold/Unsold
    $soldCount=Device::where('status', '=','sold')->count();
    $unsoldCount=Device::where('status', '=','unsold')->count();

//Total Device
    $totalDeviceCount=Device::where('ice_id', '<>','ice_id')->count();
//Purchase Device
    // $purchaseCount=Purchase::where('id', '<>','id')->count();
//
    $customerCount=Customer::where('id', '<>','id')->count();

    $salesAgentCount=Users::where('user_type', '=','sales_agent')->count();
    $technicianCount=Users::where('user_type', '=','technician')->count();


    $vehicleCount=Vechicles::where('id', '<>','id')->count();

    $manifacturerCount=Manifacturer::where('id', '<>','id')->count();

    //
    $allvehicle=Vechicles::with(['customer_id'])->latest()->limit(3)->get();


   
   
       

    return view("index",compact('customerCount','vehicleCount','allvehicle','soldCount','unsoldCount','salesAgentCount','technicianCount','totalDeviceCount','manifacturerCount'));



  
    }

    public function latesDevice(){
       
        $data=DB::table('sales')->get();
        $allcustomer=Customer::latest()->limit(3)->get();
        $allvehicle=Vechicles::with(['customer_id'])->latest()->limit(3)->get();
              
           



              return view('index')->with(compact('data','allcustomer','allvehicle'));
    }

    

}
