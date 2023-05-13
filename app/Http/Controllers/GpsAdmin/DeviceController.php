<?php

namespace App\Http\Controllers\GpsAdmin;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Sales;
use App\Models\Admin\Users;

use App\Models\Admin\Manifacturer;

use App\Models\Admin\Transaction;

use App\Models\Admin\SimTypes;
use PDF;
use load;

class DeviceController extends Controller
{
    	//Devices section------------------------------------------------------------------------

        public function  DeviceRegister(Request $request)
        {    
             
         $request->validate(
          [
              
               'ice_id'=>'required|unique:Device',
               'imei'=>'required|unique:Device',
               'sim1'=>'required',
               'sim_1_type'=>'required',
               'sim2'=>'required',
               'sim_2_type'=>'required',
               'received_date'=>'required',
              
          ]
          );
    
      
   
              
             $Device = new Device ;	
             $Device->manufactured_by = $request->input('manufactured_by');
             $Device->ice_id = $request->input('ice_id');
             $Device->imei = $request->input('imei');
             $Device->sim1 = $request->input('sim1');
             $Device->sim_1_type = $request->input('sim1_type');
             $Device->sim2 = $request->input('sim2');
             $Device->sim_2_type = $request->input('sim2_type');
             $Device->activation_date = $this->change_date_format($request->input('activation_date'));
             $Device->received_date = $this->change_date_format($request->input('received_date'));
             $Device->renewal_date = $this->change_date_format($request->input('renewal_date'));

             $Device->status = $request->input('status');
 
             $Device->save();
         

        
             //    print_r($Device); die();
           
             return redirect('/device/device_table');

                 
                 }
 
         public function view_device()
    {
       $data=Device::with(['sim_1_type_id','sim_2_type_id','customer_id_id','user_id_id','sales_id_id'])->get();
     

        return view('device/device_table')->with(compact('data')); 


    }

    private function change_date_format($date)
    {
           $chnage_date = strtotime($date);
 
           $chnage_date_f = date('M d, Y',( $chnage_date ) );
 
           return $chnage_date_f;
    }
 
 
    
 
     public function add_device()
     {    
         
         $alldevice = Device::get();
         $allsales = Sales::get();
          $sim_get = SimTypes::get();
          $allmanifacturer = Manifacturer::get();


         // print_r($alldevice); die();
          return view('/device/add_device')->with(compact('alldevice','sim_get','allmanifacturer','allsales'));
     }
 
 
 
 
 public function device_edit()
     {    
          $id =$_GET['id'];
          $data=DB::table('device')
                ->where('id',"=",$id)
                ->first();
 
          $alldevice = Device::get();
          $allmanifacturer  = Manifacturer::get();

          $sim_get = DB::table('sim_types')->get();
 
 
         // print_r($data); die();
          return view('/device/device_edit')->with(compact('data','alldevice','sim_get','allmanifacturer'));
     }
 
 
          
 
         public function device_update($id,Request $request)
         {
 
          
           
 
         $data = $request->all();
                $device = Device::find($id);
                
               
          $device->manufactured_by = $request->input('manufactured_by_id');
           $device->ice_id = $request->input('ice_id');
           $device->imei = $request->input('imei');
           $device->sim1 = $request->input('sim1');
           $device->sim_1_type = $request->input('sim_1_type');
           $device->sim2 = $request->input('sim2');
           $device->sim_2_type = $request->input('sim_2_type');
           $device->activation_date =$this->change_date_format($request->input('activation_date'));
           $device->received_date =$this->change_date_format($request->input('received_date'));
           $device->renewal_date = $this->change_date_format($request->input('renewal_date'));
           $device->user_id = $request->input('user_id');
           $device->customer_id = $request->input('customer_id');
          


                    // print_r($device); die();


             $device->update($data);
              
             return view('device/device_table');
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
     return view('/device_edit', compact('sim_get'));

}


public function openDeviceInfo()
{    
     $id =$_GET['id'];   
     $data=Device::with(['manufactured_by_id','user_id_id','customer_id_id','sim_1_type_id','sim_2_type_id'])->find($id);


     $sim_get = DB::table('sim_types')->get();


    // print_r($data); die();
     return view('/device_info')->with(compact('data','sim_get'));
}

public function deviceReport()
{    
    

     $alldevice = Device::get();
     $allpurchase=DB::table('Purchase')->get();
     $allsales=Sales::with(['device_id_id'])->get();
     $alltransaction=Transaction::get();
     $allmanifacturer=Manifacturer::get();

     $sim_get = DB::table('sim_types')->get();

    // print_r($data); die();
     return view('/report_device')->with(compact('alldevice','allpurchase','allsales','sim_get','alltransaction','allmanifacturer'));
}

public function reportById($id)
{    
     $data=DB::table('device')
           ->where('id',"=",$id)
           ->first();
     
          
     $allpurchase=DB::table('Purchase')
           ->where('device_number',"=",$id)->get();

           $alldevice=DB::table('Device')
           ->where('id',"=",$id)->get();


     $allsales=DB::table('Sales')
     ->where('device_id',"=",$id)->get();


     $alltransaction=DB::table('Transaction')
                       ->where('device_id',"=",$id)->get();

    

    // print_r($data); die();
     return view('/reportById')->with(compact('data','alldevice','allpurchase','allsales','alltransaction'));
}


public function pdfview_device(Request $request)  
{  
  $device = Device::all();
  $data = [
     'title' => 'Welcome to device ',
     'date' => date('m/d/Y'),
     'device' => $device
 ];
   
 $pdf = PDF::loadView('device.devicepdf', $data);

 return $pdf->download('devicepdf.pdf');
}  


public function pdfview_device_info()  {
   
  $device = Device::all();
  $data = [
     'title' => 'Welcome to device ',
     'date' => date('m/d/Y'),
     'device' => $device
 ];
   
 $pdf = PDF::loadView('device.device_infopdf', $data);

 return $pdf->download('devicedetails.pdf');
}  



}
