<?php

namespace App\Http\Controllers\Users;

use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use PDF;
use load;

class CustomerController extends Controller
{
    public function CustomerRegister(Request $request)
    {      
         $request->validate(
          [
               'name'=>'required',
               'mobile'=>'required|digits_between:10,10',
               'address'=>'required',
               'adhar_number'=>'required|unique:Customer|digits_between:12,12',
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
            
         

               
         return redirect('user/customer1/customer_table');
               
         
     }
     


     public function customer_view()
{
   $data=Customer::get();

   //print_r($data); die();

   //get data from database 
   return view('users/customer/customer_table')->with(compact('data')); 
}
  

  public function register_customer()
{


 $customer_get = DB::table('customer')->get();

  $data=json_encode($customer_get);

 

   // print_r($data);die();
     return view('users/customer/register_customer', compact('customer_get'));

}




public function customer_edit()
 {    
      $id =$_GET['id'];
      $data=DB::table('customer')
            ->where('id',"=",$id)
            ->first();

     // print_r($data); die();
      return view('users/customer/customer_edit')->with(compact('data'));
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


 
public function openCustomerInfo()
{    
     $id =$_GET['id'];
     $data=DB::table('customer')
           ->where('id',"=",$id)
           ->first();

    // print_r($data); die();
     return view('customer_info')->with(compact('data'));
}


public function pdfview_customer(Request $request)  
{  
  $customer = Customer::all();
  $data = [
     'title' => 'Welcome to device ',
     'date' => date('m/d/Y'),
     'customer' => $customer
 ];
   
 $pdf = PDF::loadView('users.customer.customerpdf', $data);

 return $pdf->download('customerpdf.pdf');
}  

}
