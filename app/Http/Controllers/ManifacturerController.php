<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Admin\Manifacturer;


class ManifacturerController extends Controller
{
    
    
    public function ManifacturerRegister(Request $request)
        {      
             $request->validate(
              [
                   'name'=>'required',
                   'city'=>'required',

                  
              ]
              );
    
         
    
    
             $Manifacturer = new Manifacturer;
    
    
    
             $Manifacturer->name = $request->input('name');
             $Manifacturer->city = $request->input('city');

            
    
             $Manifacturer->save();
                
             
    
                   
             return redirect('manifacturer/manifacturer_table');
                   
             
         }
    
    

      
public function register_manifacturer()
{


 $manifacturer= DB::table('manifacturer')->get();


   // print_r($data);die();
     return view('/manifacturer/manifacturer_table', compact('manifacturer'));

}
    
     
    
    
    
    public function manifacturer_edit()
     {    
          $id =$_GET['id'];
          $data=DB::table('Manifacturer')
                ->where('id',"=",$id)
                ->first();
    
         // print_r($data); die();
          return view('/manifacturer/manifacturer_edit')->with(compact('data'));
     }
    
    
          
    
         public function update($id,Request $request)
         {
    
          $data = $request->all();
                $Manifacturer = Manifacturer::find($id);
               
          $Manifacturer->name = $request->input('name');

          $Manifacturer->city = $request->input('city');

    
    
    
             $Manifacturer->update($data);
              
    
                return redirect('/manifacturer/manifacturer_table');

     }
    
    
    public function destroy()
     {
       $id =$_GET['id'];
          $data=DB::table('manifacturer')
                ->where('id',"=",$id)
                ->delete();
                 
     
         return redirect()->back();
     }
    
    
 
    
    }
    

