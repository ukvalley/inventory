<?php

namespace App\Http\Controllers\Users;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Records;


class RecordsController extends Controller
{
    public function Records(Request $request)
      
    {    

         $records = new Records; 
        
         $records->user_id = $request->input('user_id');
         $records->device_count= $request->input('device_count');
        
      

         $records->save();
           

               
         return redirect()->back();
             
         
     }




     public function view_records()
  {

     $data=DB::table('records')->get();

     // print_r($data); die();

     //get data from database 
     return view('records_table')->with(compact($data)); 
  }

  public function register_records()
   {    
       
       $allrecords = records::get();
       $allUsers = Users::get();


       // print_r($allUsers); die();
        return view('users/records/register_records')->with(compact('allrecords','allUsers'));
   }
   
public function records_edit()
   {    
        $id =$_GET['id'];
        $data=DB::table('Records')
              ->where('id',"=",$id)
              ->first();


       // print_r($data); die();
        return view('users/records/records_edit')->with(compact('data'));
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
        $data=DB::table('records')
              ->where('id',"=",$id)
              ->delete();


               
   
       return redirect()->back();
   }  
}
