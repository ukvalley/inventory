<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Customer;


class VehicleController extends Controller
{
   //Posting data in Vehicle Table ----------------------------------------------------------------------------
   public function  VehiclesRegister(Request $request)
	   
   {      
          


           
          $Vechicles = new Vechicles;	

   
          $Vechicles->vechicle_number =  $request->input('vechicle_number');
          $Vechicles->customer =   $request->input('customer'); 
          $Vechicles->rc_book_file =    $request->input('rc_book_file');
          $Vechicles->vehicle_image_1 = $request->input('vehicle_image_1');	
          $Vechicles->vehicle_image_2 = $request->input('vehicle_image_2');
          $Vechicles->vehicle_image_3 = $request->input('vehicle_image_3');
          $Vechicles->vehicle_image_4 = $request->input('vehicle_image_4');
          $Vechicles->vehicle_image_5 = $request->input('vehicle_image_5');
        



          $Vechicles->save();
              

                
          return redirect()->back();
           
          
  }





     public function vehicle_table()
 {

    $data=DB::table('vechicles')->get();

    //print_r($data); die();



    //get data from database 
    return view('vehicle_table'); 

 }


// To get data from costumer table


 public function register_vehicle()
 {
 

 
   $allvehicle = Vechicles::get();
   
    $allcustomer = Customer::get();

  

    // print_r($allvehicle);die();
      return view('register_vehicle', compact('allvehicle','allcustomer'));

 }




public function view_vehicle()
 {
    $data=DB::table('vechicles')->get();
    



    //print_r($data); die();
    return view('vehicle_table')->with(compact('data',)); 
 }



public function vehicle_edit()
  {    
           $id =$_GET['id'];
       $data=DB::table('vechicles')
             ->where('id',"=",$id)
             ->first();

       $allcustomer = Customer::get();

      // print_r($Customer_name); die();
       return view('/vehicle_edit')->with(compact('data','allcustomer'));
  }



       

      public function vehicle_update($id,Request $request)
      {
       

        $Vechicles->vechicle_number =$request->input('vechicle_number');
          $Vechicles->customer = $request->input('customer');
          $Vechicles->rc_book_file =$request->input('rc_book_file');
          $Vechicles->vehicle_image_1 = $request->input('vehicle_image_1');
          $Vechicles->vehicle_image_2 = $request->input('vehicle_image_2');
          $Vechicles->vehicle_image_3 =$request->input('vehicle_image_3');
          $Vechicles->vehicle_image_4 =$request->input('vehicle_image_4');
          $Vechicles->vehicle_image_5 = $request->input('vehicle_image_5');


            


          $Vechicles->update($data);
           

            return redirect()->back();
       // return redirect()->route('customer_table')
       //                ->with('success','Customer updated successfully'); 

  }


public function vehicle_destroy()
  {
    $id =$_GET['id'];
       $data=DB::table('vechicles')
             ->where('id',"=",$id)
             ->delete();
              
  
      return redirect()->back();
  }
}
