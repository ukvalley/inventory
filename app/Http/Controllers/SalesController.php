<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin\Sales;
use PDF;

use load;

class SalesController extends Controller
{
    
  public function Sales(Request $request)
  {        
      
   $request->validate(
      [
           'date'=>'required',
           'mobile'=>'required',
           'device_id'=>'required',
           'device_number'=>'required',
           'allocated_to'=>'required',
           'user_id'=>'required'
      ]
      );

     //insert data in database


         

       $Sales = new Sales; 

       $Sales->date = $this->change_date_format($request->input('date'));
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
   return view('sale/sales_table')->with(compact('data')); 
}

public function register_sales()
 {    
     
     $allsales = Sales::get();
    
     // print_r($allsales); die();
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

       $Sales->date =$this->change_date_format($request->input('date'));
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
 
 private function change_date_format($date)
 {
        $chnage_date = strtotime($date);

        $chnage_date_f = date('M d, Y', strtotime( $chnage_date ) );

        return $chnage_date_f;
 }

//  public function createPDF() {
//      // retreive all records from db
//      $data = Sales::all();
//      // share data to view
//      view()->share('sales',$data);
//      $pdf = PDF::loadView('sale/sales_table', $data);
//      // download PDF file with download method

//      return $pdf->download('pdf_file.pdf');
//    }
 
public function openSalesInfo()
{    
     $id =$_GET['id'];
     $data=DB::table('Sales')
           ->where('id',"=",$id)
           ->first();
    
     $allsales = Sales::get();

    // print_r($data); die();
     return view('sales_info')->with(compact('data','allsales'));
}

//script pdf
     public function pdfview(Request $request)  
    {  
        
        $a = [];
        $data = Sales::all();

       // die();        
        $pdf = PDF::loadView('sale.salespdf', array('data' =>  $data));

         return $pdf->stream();
    }  




//    public function viewPDF()
//     {
//         $sales = Sales::all();

//         $pdf = PDF::loadView('pdf.salesdetails', array('users' =>  $sales))
//         ->setPaper('a4', 'portrait');

//         return $pdf->stream();

//     }




//     public function downloadPDF()
//     {
//         $sales = Sales::all();

//         $pdf = PDF::loadView('pdf.salesdetails', array('sales' =>  $sales))
//         ->setPaper('a4', 'portrait');

//         return $pdf->download('sales-details.pdf');   
//     }

}
