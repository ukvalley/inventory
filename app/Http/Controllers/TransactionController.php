<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Admin\Transaction;



class TransactionController extends Controller
{

 
public function Transaction(){


    $allCustomer = Customer::get();
    $allDevice = Device::get();
    $allVehicle = Vehicle::get();
    $allUser = Users::get();




        //    print_r($alldevice);die();


    return view('/Transaction', compact('allCustomer','alldevice','allUser','allVehicle'));


}

public function transactionUpdate(Request $request)
        {
         
          foreach ($transaction as $key => $value) {
            
    
    
            $transaction = Transaction::find($value);
    
            $transaction->user_id = $request->sender;
    
            $transaction->save();
    




}

    
}
}