<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    
 	public function PurchaseDevice(Request $request)
     {        
        //insert data in database 	

          $Purchase = new Purchase;	

          $Purchase->date =  $this->change_date_format($request->input('date'));
    
          $Purchase->device_number = $request->input('device_number');
          $Purchase->amount = $request->input('amount');	
         $Purchase->quantity = $request->input('quantity');
          $Purchase->purchase_from = $request->input('purchase_from');	


          $Purchase->save();
              

                
          return redirect()->back();
                
          
      }


      public function view_purchase()
 {
    $data=DB::table('purchase')->get();

    //print_r($data); die();

    //get data from database 
    return view('purchase_table')->with(compact($data)); 
 }

 public function register_purchase()
  {    
      
      $allpurchase = Purchase::get();

      // print_r($allpurchase); die();
       return view('/register_purchase')->with(compact('allpurchase'));
  }

public function purchase_edit()
  {    
       $id =$_GET['id'];
       $data=DB::table('purchase')
             ->where('id',"=",$id)
             ->first();
        
                $allpurchase = Purchase::get();


      // print_r($allpurchase); die();
       return view('/purchase_edit')->with(compact('data','allpurchase'));
  }


       

      public function purchase_update($id,Request $request)
      {
          $data = $request->all();
             $Purchase = Purchase::find($id);


       $Purchase->date = $request->input('date');

          $Purchase->device_number = $request->input('device_number');
          $Purchase->amount =  $request->input('amount');
         $Purchase->quantity =  $request->input('quantity');
           $Purchase->purchase_from = $request->input('purchase_from');


           



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
}
