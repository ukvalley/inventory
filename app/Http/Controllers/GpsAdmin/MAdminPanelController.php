<?php

namespace App\Http\Controllers\GpsAdmin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\CsvImportRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Device;
use App\Models\Admin\Users;
use App\Models\Admin\Purchase;
use App\Models\Admin\Sales;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Records;
use App\Models\CsvData;
use App\Models\Admin\Transaction;





//NOT YET DELETED...?????

class MAdminPanelController extends Controller
{

    private function change_date_format($date)
    {
        
           $chnage_date = strtotime($date);         
           $chnage_date_f = date('M d, Y', $chnage_date);

        
 
           return $chnage_date_f;
    }


    private function change_date_format_time($date)
    {
           $chnage_date = strtotime($date);
 
           $chnage_date_f = date('M d, Y', strtotime($chnage_date) );
 
           return $chnage_date_f;
    }
 





   



        //INTERNAL TRANSFER-------------------------------------------------------------------------
         
        public function get_device()
        { 

        $alldevice =Device::with(['manufactured_by_id'])->get();
         
       
         //print_r($alldevice);die();

         return view('/transfer_transaction', compact('alldevice'));
       
        }

       



public function getUserType($user_type)
{ 

    $userType = Users::where('user_type',"=",$user_type)->get();

    $userType=json_encode($userType);

   return $userType;
     

}

public function transferUpdate(Request $request)
{

$devices = $request->select;

    foreach ($devices as $key => $value) {


        


        $device = Device::find($value);
        


        $device->user_id = $request->user;
        
        //--------------------
        // foreach ($devices as $key => $value) {
        //     $device = Device::find($value);
            
        //     // Show confirmation dialog
        //     $isConfirmed = false;
        //     $isConfirmed = $this->showConfirmationDialog($device, $userId);
            
        //     if ($isConfirmed) {
        //         // Update device user ID
        //         $device->user_id = $userId;
        //         $device->save();
        //     } else {
        //         // Handle cancellation or rejection
        //         // ...
        //     }
        // }
        //---------------------

  $device->save();

    }

}

//////////Salessssssssssss DEvice

public function getCustomer()      
       { 
            $data=Device::with(['user_id_id'])->get();
            $allCustomer = Customer::get();

            $allVehicle = Vechicles::get();

        //    print_r($alldevice);die();
        return view('/device_sale', compact('data','allCustomer','allVehicle'));
        }

        
public function get_customer($user_type)
{ 

    $customer = Customer::where('customer',"=",$customer)->get();

    $customer=json_encode($customer);

   return $customer;    

}



        public function saleUpdate(Request $request)
        {
         
            $devices = $request->select;

        foreach ($devices as $key => $value) {
            
    
    
            $device = Device::find($value);
    
            $device->customer_id= $request->customer;
            $device->status='sold';

            // print_r($device); 

            $device->save();

        

            

        



            //entry in sales

            $Sale = new Sales;

            $today = date('d-m-Y');
           
            $Sale->date =  $this->change_date_format($today);
            $Sale->device_id = $device->id;
            $Sale->device_number = $device->ice_id;
            $Sale->allocated_to = $device->customer_id;
            $Sale->user_id = $device->user_id;          

            // print_r($Sale);
            $Sale->save();

            
                 
              


        //entry in transaction table
            $Transaction = new Transaction;
          
            $today = date('d-m-Y');
           
            $Transaction->device_id = $device->device_id; 
            $Transaction->sender = $device->user_id;         
            $Transaction->receiver = $device->customer_id;
            $Transaction->date =  $this->change_date_format($today);
            
            $Transaction->amount = 1;
            $Transaction->transaction_type = 1;
            $Transaction->quantity = 1; 
            
 

            // print_r($Transaction);  die();


            $Transaction->save();

           
                 
}

          
}






}