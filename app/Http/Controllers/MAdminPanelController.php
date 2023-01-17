<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Users;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Sales;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Records;



class MAdminPanelController extends Controller
{


        // public function index()
        // {
        //     $data=['name'=>"Ashish",'data'=>"hellow Ashish"];
        //     $user['to']='ashishshinde.ukvalley@gmail.com'; 
        //     Mail::send('mail',$data,function($messages) use ($user ){
        //         $messages->to($user['to']);
        //         $messages->subject('Hello  MAIL check');
        //     });
        // }
   
   // Posting data in Customer Table

   public function exportDevice(){
    print_r('export');

   }

 	public function CustomerRegister(Request $request)
	   {      


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
        return view('register_customer', compact('customer_get'));

   }




public function customer_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('customer')
               ->where('id',"=",$id)
               ->first();

        // print_r($data); die();
         return view('/customer_edit')->with(compact('data'));
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
















// //Posting data in Vehicle Table ----------------------------------------------------------------------------
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



 








//user data insertion in table---------------------------------------------------------------------------------------------


public function  UserRegister(Request $request)
{

	         

	          
	     	
	        $User = new Users;	

	 
	        $User->name = $request->input('name');
	        $User->mobile = $request->input('mobile');
	        $User->city = $request->input('city');	
	        $User->admiko_parent_child = $request->input('admiko_parent_child');
	        $User->basic_amount = $request->input('basic_amount');
	        $User->user_type = $request->input('user_type');
	        

	        $User->save();
	        	

	              
	        return redirect()->back();
	        	
	        	}
            
	    public function view_user()
   {
      $data=DB::table('Users')->get();

      //print_r($data); die();



      //get data from database 
      return view('user_table')->with(compact($data)); 
   }


   public function register_user()
    {    
        
        $allusers = Users::get();

        // print_r($data); die();
         return view('/register_user')->with(compact('allusers'));
    }


   public function user_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('users')
               ->where('id',"=",$id)
               ->first();

        $allusers = Users::get();

        // print_r($data); die();
         return view('/user_edit')->with(compact('data','allusers'));
    }


	     

		public function user_update($id,Request $request)
    	{
          
           $data = $request->all();
               $users = Users::find($id);
	        
              
          $users->name =$request->input('name');
	        $users->mobile = $request->input('mobile');
	        $users->city = $request->input('city');
	        $users->admiko_parent_child = $request->input('admiko_parent_child');
	        $users->basic_amount = $request->input('basic_amount');
	        $users->user_type =$request->input('user_type');


	         



	        $users->update($data);
 			

 			 return redirect()->back();
 

    }


 public function user_destroy()
    {
      $id =$_GET['id'];
         $data=DB::table('users')
               ->where('id',"=",$id)
               ->delete();
                
    
        return redirect()->back();
    }



	        	











	        	//Devices section------------------------------------------------------------------------

	        	public function  DeviceRegister(Request $request)
	   {        
     
  
	     	
	        $Device = new Device ;	


          

	        $Device->make = $request->input('make');
	        $Device->ice_id = $request->input('ice_id');
	        $Device->imei = $request->input('imei');
	        $Device->sim1 = $request->input('sim1');
	        $Device->sim_1_type = $request->input('sim1_type');
	        $Device->sim2 = $request->input('sim2');
	        $Device->sim_2_type = $request->input('sim2_type');
	        $Device->activation_date = $this->change_date_format($request->input('activation_date'));
	        $Device->received_date = $this->change_date_format($request->input('received_date'));
	        $Device->renewal_date = $this->change_date_format($request->input('renewal_date'));
	        

	        $Device->save();
	        	

	              
	        return redirect()->back();
	        	
	        	}

	    public function view_device()
   {
      $data=DB::table('device')->get();

      // print_r($data); die();

      //get data from database 
      return view('device_table')->with(compact($data)); 
   }


   private function change_date_format($date)
   {
          $chnage_date = strtotime($date);

          $chnage_date_f = date('M d, Y', strtotime( $chnage_date ) );

          return $chnage_date_f;
   }


   

    public function add_device()
    {    
        
        $alldevice = device::get();

        // print_r($alldevice); die();
         return view('/add_device')->with(compact('alldevice'));
    }




public function device_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('device')
               ->where('id',"=",$id)
               ->first();

         $alldevice = Device::get();


        // print_r($data); die();
         return view('/device_edit')->with(compact('data','alldevice'));
    }


	     

		public function device_update($id,Request $request)
    	{

         
          

        $data = $request->all();
               $device = Device::find($id);
              
         $device->make = $request->input('make');
          $device->ice_id = $request->input('ice_id');
          $device->imei = $request->input('imei');
          $device->sim1 = $request->input('sim1');
          $device->sim1_type = $request->input('sim1_type');
          $device->sim2 = $request->input('sim2');
          $device->sim2_type = $request->input('sim2_type');
          $device->activation_date = $request->input('activation_date');
          $device->received_date = $request->input('received_date');
          $device->renewal_date = $request->input('renewal_date');
	          



	        $device->update($data);
 			

 			 return redirect()->back();
         // return redirect()->route('customer_table')
         //                ->with('success','Customer updated successfully'); 

    }


 public function device_destroy()
    {
      $id =$_GET['id'];
         $data=DB::table('device')
               ->where('id',"=",$id)
               ->delete();
                
    
        return redirect()->back();
    }






//Purchase*******************************************************************************************************


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


    
    ///
    ///
    ///
    ///
    ///recored update purchase
    public function purchaseOrder(){

      //create device information

           $device= new Device;
 $data = [
         
         'make' => $device->make,
         'ice_id' => $device->ice_id,
         'imei' => $device->imei,
         'sim_1_type' => $device->sim_1_type,
         'sim_2_type' => $device->sim_2_type,

         ];
	        
         $Device->update($data);

      // get Total Count of Device  of users
      

        
      $user_records= DB::table('records')
      ->where('user_id','=',$user_id)
      ->first();

      $count_new = $user_records->device_count + 1;
 
      $update_count = [];
      $update_count['device_count'] = $count_new;
      

       DB::table('records')
      ->where('user_id','=',$user_id)
      ->update($update_count);
      
 
       //Total value of device
 
 
 
       //purchase entry creation
 
   
       $purchase_entry_data['date']= "date";
       $purchase_entry_data['device_id']="device_id";
       $purchase_entry_data['device_number']="device_number";
       $purchase_entry_data['quantity']="quantity";
       $purchase_entry_data['purchase_from']="purchase_from";

       print_r($data);

    } 
    


    



    //SALES*******************************************************************************************************


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
         return view('/register_sales')->with(compact('allsales'));
    }



public function sales_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('Sales')
               ->where('id',"=",$id)
               ->first();
        
         $allsales = Sales::get();

        // print_r($data); die();
         return view('/sales_edit')->with(compact('data','allsales'));
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







    //records
      
      public function Records(Request $request)
      
     {    

          $Records = new Records; 
         
          $Records->user_id = $request->input('user_id');
          $Records->device_count= $request->input('device_count');
         

          $Records->save();
            

                
          return redirect()->back();
              
          
      }



      public function view_records()
   {
      $data=DB::table('Records')->get();

      //print_r($data); die();

      //get data from database 
      return view('records_table')->with(compact($data)); 
   }

   public function register_records()
    {    
        
        $allrecords = records::get();
        $allUsers = Users::get();


        // print_r($allrecords); die();
         return view('/register_records')->with(compact('allrecords','allUsers'));
    }
    
public function records_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('Records')
               ->where('id',"=",$id)
               ->first();


        // print_r($data); die();
         return view('/records_edit')->with(compact('data'));
    }


       

    public function records_update($id,Request $request)
      {
         $Records = $request->all();
               $Records = Records::find($id);

      
          $Records->user_id =$request->input('user_id');  
          $Records->device_alloted =$request->input('device_alloted'); 
          


           


          $Records->update($data);
      

       return redirect()->back();
         // return redirect()->route('customer_table')
         //                ->with('success','Customer updated successfully'); 

    }


 public function records_destroy()
    {
      $id =$_GET['id'];
         $data=DB::table('Records')
               ->where('id',"=",$id)
               ->delete();


                
    
        return redirect()->back();
    }  





    //SIM Types---------------------------------------------------------------------------------------------------------


      public function SimTypes(Request $request)
     {      


          $SimTypes = new SimTypes;



          $SimTypes->name = $request->input('name');

          $SimTypes->save();


            

                
          return redirect()->back();
              
          
      }

      




 public function add_sim()
   {
   

    $sim_get = DB::table('sim_types')->get();

  
      // print_r($data);die();
        return view('add_device', compact('sim_get'));

   }
   
   
 public function add_user()
 {
 

  $user_get = DB::table('users')->get();


    // print_r($data);die();
      return view('add_user', compact('user_get'));

 }

public function sim_edit()
    {    
         $id =$_GET['id'];
         $data=DB::table('sim_types')
               ->where('id',"=",$id)
               ->first();

             

        // print_r($data); die();
         return view('/sim_edit')->with(compact('data'));
    }


       

    public function sim_update($id,Request $request)
      {

         $data = $request->all();
        $SimTypes = SimTypes::find($id);
         

         $SimTypes->name = $request->input('name');
         

           



          $SimTypes->update($data);
      

        return redirect()->back();
         // return redirect()->route('customer_table')
         //                ->with('success','Customer updated successfully'); 

    }


 public function sim_destroy()
    {
      $id =$_GET['id'];
         $data=DB::table('sim_types')
               ->where('id',"=",$id)
               ->delete();
                
    
        return redirect()->back();
    }
       
              
}

