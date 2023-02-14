<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Purchase;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Customer;
use App\Models\Admin\Users;

use App\Models\Admin\Manifacturer;

use App\Models\Admin\Device;





class PurchaseController extends Controller
{
    
 	public function PurchaseDevice(Request $request)
     {     
      
         
      $validator = \Validator::make($request->all(), [
          'date'=>'required',
          'ice_id'=>'required|unique:Purchase',
          'imei'=>'required|unique:Purchase',
          'sim1_number'=>'required|unique:Purchase',
          'sim2_number'=>'required|unique:Purchase',
           'amount'=>'required',
           'quantity'=>'required',
           'manufactured_by'=>'required',
           
        ]
        );
        if ($validator->fails()) {
          $errors = $validator->errors();
          return $errors->toJson();
      }
     
      else {
        

        //insert data in database 
        
        

          $Purchase = new Purchase;	

          $Purchase->date =  $this->change_date_format($request->input('date'));
    
          $Purchase->ice_id = $request->input('ice_id');
          $Purchase->amount = $request->input('amount');	
          $Purchase->quantity = $request->input('quantity');
          $Purchase->manufactured_by = $request->input('manufactured_by');	

          $Purchase->save();
          

          $Device = new Device ;	
          $Device->make = $request->input('manufactured_by');
          $Device->ice_id = $request->input('ice_id');
          $Device->imei = $request->input('imei');
          $Device->sim1 = $request->input('sim1_number');
          $Device->sim_1_type = $request->input('sim_1_type');
          $Device->sim2 = $request->input('sim2_number');
          $Device->sim_2_type = $request->input('sim_2_type');
          $Device->user_id = $request->input('user_id');

         
          $Device->received_date = $this->change_date_format($request->input('date'));
          $Device->status = $request->input('device_status');


          
          $Device->save();


         

       

              

                
          return redirect()->back();
      }       
          
      }

      private function change_date_format($date)
      {
             $chnage_date = strtotime($date);
   
             $chnage_date_f = date('M d, Y',( $chnage_date ) );
   
             return $chnage_date_f;
      }


      public function view_purchase()
 {
    $data=DB::table('purchase')->get();
    $sim_get=DB::table('simtypes')->get();

    //print_r($data); die();

    //get data from database 
    return view('purchase/purchase_table')->with(compact($data,$sim_get)); 
 }

 public function register_purchase()
  {    
      
      $allpurchase = Purchase::get();
      $sim_get = SimTypes::get();
      $allusers = Users::get();
      $allmanifacturer = Manifacturer::get();




     


      // print_r($allpurchase); die();
       return view('/purchase/purchase_device')->with(compact('allpurchase','sim_get','allusers','allmanifacturer'));
  }

public function purchase_edit()
  {    
       $id =$_GET['id'];
       $data=DB::table('purchase')
             ->where('id',"=",$id)
             ->first();
        
                $allpurchase = Purchase::get();
                $sim_get = DB::table('sim_types')->get();
                $allcustomer = Customer::get();

                $allusers = Users::get();
                $alldevice = Device::get();



      // print_r($allpurchase); die();
       return view('/purchase/purchase_edit')->with(compact('data','allpurchase','sim_get','allcustomer','allusers','alldevice'));
  }


       

      public function purchase_update($id,Request $request)
      {
          $data = $request->all();
             $Purchase = Purchase::find($id);
             $Device = Device::find($id);


       $Purchase->date = $request->input('date');

          $Purchase->ice_id = $request->input('ice_id');
          $Purchase->amount =  $request->input('amount');
          $Purchase->quantity =  $request->input('quantity');

          
          

           $Device->make = $request->input('manufactured_by');
          $Device->ice_id = $request->input('ice_id');
          $Device->imei = $request->input('imei');
          $Device->sim1 = $request->input('sim1_number');
          $Device->sim_1_type = $request->input('sim1_type');
          $Device->sim2 = $request->input('sim2_number');
          $Device->sim_2_type = $request->input('sim2_type');


          $Purchase->update($data);
          $Device->update($data);

           

            return redirect()->back();
       // return redirect()->route('customer_table')
       //                ->with('success','Customer updated successfully'); 

  }

public function purchase_destroy()
  {
    $id =$_GET['id'];
       $data=DB::table('Purchase')
             ->where('id',"=",$id)
             ->delete();
              
  
      return redirect()->back();
  }

  
public function openPurchaseInfo()
{    
     $id =$_GET['id'];
     $data=DB::table('purchase')
           ->where('id',"=",$id)
           ->first();
      
              $allpurchase = Purchase::get();
              


    // print_r($allpurchase); die();
     return view('purchase_info')->with(compact('data','allpurchase'));
}
}
