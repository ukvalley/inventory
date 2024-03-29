<?php

namespace App\Http\Controllers\Users;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\SimTypes;

class SimController extends Controller
{
   //SIM Types---------------------------------------------------------------------------------------------------------


   public function SimTypes(Request $request)
   {         
    $request->validate(
     [
          'name'=>'required|unique:sim_types',
         
           
     ]
     );


        $SimTypes = new SimTypes;



        $SimTypes->name = $request->input('name');

        $SimTypes->save();


          

              
        return redirect('users/sim/sim_table');

            
        
    }

    




public function add_sim()
 {
 

  $sim_get = DB::table('sim_types')->get();


    // print_r($data);die();
      return view('users/add_device', compact('sim_get'));

 }
 
 
public function add_user()
{


$user_get = DB::table('users')->get();


  // print_r($data);die();
    return view('users/add_user', compact('user_get'));

}

public function sim_edit()
  {    
       $id =$_GET['id'];
       $data=DB::table('sim_types')
             ->where('id',"=",$id)
             ->first();

           

      // print_r($data); die();
       return view('users//sim/sim_edit')->with(compact('data'));
  }


     

  public function sim_update($id,Request $request)
    {

       $data = $request->all();
      $SimTypes = SimTypes::find($id);
       

       $SimTypes->name = $request->input('name');
       

         



        $SimTypes->update($data);
    

        return redirect('users/sim/sim_table');
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


  public function add_simtype()
  {
  
  
   $sim_get = DB::table('sim_types')->get();
  
  
     // print_r($data);die();
       return view('users/sim/simtypes', compact('sim_get'));
  
  }
    

}
