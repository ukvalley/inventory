<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Sales;


class SalesController extends Controller
{
    
  public function Sales(Request $request)
  {        
     //insert data in database


         

       $Sales = new Sales; 

       $Sales->date = $request->input('date');
       $Sales->device_id = $request->input('device_id');
       $Sales->device_number = $request->input('device_number');
       $Sales->allocated_to = $request->input('allocated_to');  
        $Sales->user_id = $request->input('user_id'); 

       $Sales->save();
              
       return redirect()->back();
           
       
   }


   public function view_sales()
{
   $data=DB::table('Sales')->get();

   //print_r($data); die();

   //get data from database 
   return view('sales_table')->with(compact($data)); 
}

public function register_sales()
 {    
     
     $allsales = Sales::get();

     // print_r($data); die();
      return view('/sale/register_sales')->with(compact('allsales'));
 }



public function sales_edit()
 {    
      $id =$_GET['id'];
      $data=DB::table('Sales')
            ->where('id',"=",$id)
            ->first();
     
      $allsales = Sales::get();

     // print_r($data); die();
      return view('/sale/sales_edit')->with(compact('data','allsales'));
 }


    

 public function sales_update($id,Request $request)
   {
      $data = $request->all();
            $Sales = Sales::find($id);

       $Sales->date =$request->input('date'); 
       $Sales->device_id =$request->input('device_id');  
       $Sales->device_number =$request->input('device_number'); 
       $Sales->allocated_to = $request->input('allocated_to'); 
        $Sales->user_id = $request->input('user_id'); 


        


       $Device->update($data);
   

    return redirect()->back();
      // return redirect()->route('customer_table')
      //                ->with('success','Customer updated successfully'); 

 }


public function sales_destroy()
 {
   $id =$_GET['id'];
      $data=DB::table('Sales')
            ->where('id',"=",$id)
            ->delete();
             
 
     return redirect()->back();
 }
}