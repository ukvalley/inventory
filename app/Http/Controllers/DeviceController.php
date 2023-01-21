<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Device;
use App\Models\Admin\SimTypes;


class DeviceController extends Controller
{
    	//Devices section------------------------------------------------------------------------

        public function  DeviceRegister(Request $request)
        {        
      
   
              
             $Device = new Device ;	
 
 
           
 
             $Device->make = $request->input('make');
             $Device->ice_id = $request->input('ice_id');
             $Device->imei = $request->input('imei');
             $Device->sim1 = $request->input('sim1');
             $Device->sim_1_type = $request->input('sim1_type');
             $Device->sim2 = $request->input('sim2');
             $Device->sim_2_type = $request->input('sim2_type');
             $Device->activation_date = $this->change_date_format($request->input('activation_date'));
             $Device->received_date = $this->change_date_format($request->input('received_date'));
             $Device->renewal_date = $this->change_date_format($request->input('renewal_date'));
             
 
             $Device->save();
                 
 
                   
             return redirect()->back();
                 
                 }
 
         public function view_device()
    {
       $data=DB::table('device')->get();
 
       // print_r($data); die();
 
       //get data from database 
       return view('device_table')->with(compact($data)); 
    }
 
 
    private function change_date_format($date)
    {
           $chnage_date = strtotime($date);
 
           $chnage_date_f = date('M d, Y', strtotime( $chnage_date ) );
 
           return $chnage_date_f;
    }
 
 
    
 
     public function add_device()
     {    
         
         $alldevice = device::get();

          $sim_get = SimTypes::get();

         // print_r($alldevice); die();
          return view('/device/add_device')->with(compact('alldevice','sim_get'));
     }
 
 
 
 
 public function device_edit()
     {    
          $id =$_GET['id'];
          $data=DB::table('device')
                ->where('id',"=",$id)
                ->first();
 
          $alldevice = Device::get();
 
 
         // print_r($data); die();
          return view('/device/device_edit')->with(compact('data','alldevice'));
     }
 
 
          
 
         public function device_update($id,Request $request)
         {
 
          
           
 
         $data = $request->all();
                $device = Device::find($id);
               
          $device->make = $request->input('make');
           $device->ice_id = $request->input('ice_id');
           $device->imei = $request->input('imei');
           $device->sim1 = $request->input('sim1');
           $device->sim1_type = $request->input('sim1_type');
           $device->sim2 = $request->input('sim2');
           $device->sim2_type = $request->input('sim2_type');
           $device->activation_date = $request->input('activation_date');
           $device->received_date = $request->input('received_date');
           $device->renewal_date = $request->input('renewal_date');
               
 
 
 
             $device->update($data);
              
 
               return redirect()->back();
          // return redirect()->route('customer_table')
          //                ->with('success','Customer updated successfully'); 
 
     }
 
 
  public function device_destroy()
     {
       $id =$_GET['id'];
          $data=DB::table('device')
                ->where('id',"=",$id)
                ->delete();
                 
     
         return redirect()->back();
     }

     

public function add_sim()
{


 $sim_get = DB::table('sim_types')->get();


   // print_r($data);die();
     return view('add_sim', compact('sim_get'));

}
}
