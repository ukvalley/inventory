<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;

class CustomerController extends Controller
{
    public function CustomerRegister(Request $request)
    {      
         $request->validate(
          [
               'name'=>'required',
               'mobile'=>'required|min:10|numeric',
               'address'=>'required',
               'adhar_number'=>'required|min:12|numeric',
               'adhar_front_image'=>'required|image',
               'adhar_back_image'=>'required|image'
          ]
          );

     


         $Customer = new Customer;



         $Customer->name = $request->input('name');
         $Customer->mobile = $request->input('mobile');
         $Customer->address = $request->input('address');
         $Customer->adhar_number = $request->input('adhar_number');
         $Customer->adhar_front_image = $request->input('adhar_front_image');	
          $Customer->adhar_back_image = $request->input('adhar_back_image');	


         $Customer->save();
             

               
         return redirect()->back();
               
         
     }


     public function view_customer()
{
   $data=DB::table('customer')->get();

   //print_r($data); die();

   //get data from database 
   return view('customer_table')->with(compact($data)); 
}
  

  public function register_customer()
{


 $customer_get = DB::table('customer')->get();

  $data=json_encode($customer_get);

 

   // print_r($data);die();
     return view('customer/register_customer', compact('customer_get'));

}




public function customer_edit()
 {    
      $id =$_GET['id'];
      $data=DB::table('customer')
            ->where('id',"=",$id)
            ->first();

     // print_r($data); die();
      return view('customer/customer_edit')->with(compact('data'));
 }


      

     public function update($id,Request $request)
     {

      $data = $request->all();
            $Customer = Customer::find($id);
           
      $Customer->name = $request->input('name');
         $Customer->mobile = $request->input('mobile');
         $Customer->address = $request->input('address');
         $Customer->adhar_number = $request->input('adhar_number');
         $Customer->adhar_front_image = $request->input('adhar_front_image');
          $Customer->adhar_back_image = $request->input('adhar_back_image');



         $Customer->update($data);
          

            return redirect()->back();
      // return redirect()->route('customer_table')
      //                ->with('success','Customer updated successfully'); 

 }


public function destroy()
 {
   $id =$_GET['id'];
      $data=DB::table('customer')
            ->where('id',"=",$id)
            ->delete();
             
 
     return redirect()->back();
 }
}
