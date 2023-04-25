<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Admin\Transaction;
use App\Models\Admin\Device;
use App\Models\Admin\Customer;
use App\Models\Admin\Users;

use App\Models\Admin\Vechicles;


use PDF;
use load;


class TransactionController extends Controller
{

 
public function Transaction(){

  $data = Transaction::with(['sender_id','receiver_id'])->get();
    $allCustomer = Customer::get();
   
    $allVehicle = Vechicles::get();
    $allUser = Users::get();
     


        //    print_r($alldevice);die();


    return view('/transaction/transaction_table', compact('data','allCustomer','allUser','allVehicle'));


}



// function status_update($id){

        
//   //get device status with id
//   $device_status=Device::select('r_status')->where('id','=','$id')->first();
     
//   //checking status
//   if($device_status->r_status == 'pending'){
//     $device_status = 'accepted';

//   }else{
//     $device_status = 'pending';
//   }

//   $value =array('r_status'=>$device_status);
//   Device::where('id',$id)->update($values);
  
//  return view();

// }



public function transactionUpdate(Request $request)
        {
         
          foreach ($transaction as $key => $value) {

            

            
    
    
            $transaction = Transaction::find($value);
    
            $transaction->user_id = $request->sender;
    
            $transaction->save();
   
}    

}

public function pdfview_transaction(Request $request)  
{  
  $transaction = Transaction::all();
  $data = [
     'title' => 'Welcome to CodeSolutionStuff.com',
     'date' => date('m/d/Y'),
     'transaction' => $transaction
 ];
   
 $pdf = PDF::loadView('transaction.transactionpdf', $data);

 return $pdf->download('transactionpdf.pdf');


}  
}