<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Admin\Transaction;
use PDF;
use load;


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
    

            return view('');



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