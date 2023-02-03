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
    $allUser = Users::get();




        //    print_r($alldevice);die();


    return view('/Transaction', compact('allCustomer','alldevice','allUser'));


}

public function transactionUpdate(Request $request)
        {
         
          foreach ($transaction as $key => $value) {
            
    
    
            $transaction = Transaction::find($value);
    
            $transaction->transaction_id = $request->sender;
    
            $transaction->save();
    




}

    
}
}