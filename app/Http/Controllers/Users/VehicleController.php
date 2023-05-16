<?php

namespace App\Http\Controllers\Users;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Customer;
use PDF;
use load;

class VehicleController extends Controller
{
   //Posting data in Vehicle Table ----------------------------------------------------------------------------
   public function  VehiclesRegister(Request $request)
	   
   {      
          
                     
         $request->validate(
          [
               'vechicle_number'=>'required|unique:Vechicles',
               'customer'=>'required',
               'rc_book_file'=>'required|image',
               'vehicle_image_1'=>'required|image',
               'vehicle_image_2'=>'required|image',
               'vehicle_image_3'=>'required|image',
               'vehicle_image_4'=>'required|image',
               'vehicle_image_5'=>'required|image',
          ]
          );


           
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
              

                
          return redirect('/vehicle/vehicle_table');
           
          
  }





     public function vehicle_table()
 {

    $data=Vechicles::with(['customer_id'])->get();

  //  print_r($data); die();
    return view('vehicle.vehicle_table')->with(compact('data')); 

 }


// To get data from costumer table


 public function register_vehicle()
 {
 

 
   $allvehicle = Vechicles::get();
   
    $allcustomer = Customer::get();

  

    // print_r($allvehicle);die();
      return view('/vehicle/vehicle_table', compact('allvehicle','allcustomer'));

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
       return view('/vehicle/vehicle_edit')->with(compact('data','allcustomer'));
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
           

          return redirect('/vehicle/vehicle_table');
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

  
public function openVehicleInfo()
{    
  $id =$_GET['id'];
 
     $data=Vechicles::with(['customer_id'])->find($id);


     $allcustomer = Customer::get();

    // print_r($Customer_name); die();
     return view('/vehicle_info')->with(compact('data','allcustomer'));
}


public function pdfview_vehicle(Request $request)  
{  
  $vehicle = Vechicles::all();
  $data = [
     'title' => 'Welcome to CodeSolutionStuff.com',
     'date' => date('m/d/Y'),
     'vehicle' => $vehicle
 ];
   
 $pdf = PDF::loadView('vehicle.vehiclepdf', $data);

 return $pdf->download('vehiclepdf.pdf');
}  

}
