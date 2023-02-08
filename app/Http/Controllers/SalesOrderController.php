<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\CsvImportRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Sales;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Records;
use App\Models\CsvData;

class SalesOrderController extends Controller
{
     // SALE
///////////////////////////////////////////////////////////////////////////////////////////////

public function salesformPost(Request $request)
{  
   
   $make = $request->make;
   $ice_id = $request->ice_id;
   $imei = $request->imei;
   $sim_1_type = $request->sim_1_type;
   $sim_2_type = $request->sim_2_type;
   $activation_date =$request ->activation_date;
   $received_date =$request ->received_date;
   $renewal_date = $request ->renewal_date;
   $user_id = $request->user_id;
   $allocated_to = $request->allocated_to;
   $device_number = $request->device_number;

   $this->salesOrder($make,$ice_id,$imei,$sim_1_type,$sim_2_type,$received_date,$activation_date,$renewal_date, $device_number,$user_id,$allocated_to);
 
   
}





 
 ///recored update purchase
 public function salesOrder($make,$ice_id,$imei,$sim_1_type,$sim_2_type,$received_date,$activation_date,$renewal_date, $device_number,$user_id,$allocated_to){

   //create device information


   // verify user having device available or not




        $device= new Device;

        $device->User_id = $User_id;
       
       

        $device->save();

   
       // update records

        $salesRecord = Records::where('user_id','=',$user_id)->first();

        $update_salesRecord_device_count = $salesRecord->device_count - 1;

        $salesRecord->device_count = $update_salesRecord_device_count;

        $salesRecord->save();





    //sales entry creation

    $sales = new sales;

    $today = date("M d, Y");
    $sales->date = $today;
    $sales->device_number= $device_number;
    $sales->allocated_to = $allocated_to;
    $sales->user_id = $user_id;

    $sales->save();   

 } 
 


 

    //CSV files import export Functions

    public function getSaleImport()
    {
        return view('import');
    }
       
    public function parseSaleImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
        'csv_data' => json_encode($data)
    ]);

    $csv_data = array_slice($data, 0, 2);
    return view('import_fields', compact('csv_data', 'csv_data_file'));
}

    public function processSaleImport(Request $request)
    {
       




        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
    foreach ($csv_data as $row) {
       $csv_row_data = [];
        
        foreach (config('app.db_fields') as $index => $field) {
          // print_r($row);
          $csv_row_data[$field] = $row[$index];
        }
        $this->csvPurchaseProcess($csv_row_data);
        
    }






    }

      

    public function csvSaleProcess($csv_row_data)
    {

      

      $make = $csv_row_data['make'];
      $ice_id = $csv_row_data['ice_id'];
      $imei = $csv_row_data['imei'];
      $sim_1_type = $csv_row_data['sim_1_type'];
      $sim_2_type = $csv_row_data['sim_2_type'];
      $received_date = $csv_row_data['received_date'];
      $activation_date = null;
      $renewal_date = null;
      $user_id = 1;
      $purchase_from = $csv_row_data['purchase_from'];
      $amount = $csv_row_data['amount'];
      



    

      $this->saleOrder($make,$ice_id,$imei,$sim_1_type,$sim_2_type,$received_date,$activation_date,$renewal_date,$user_id,$purchase_from,$amount);


    }


    public function newManifacturer(Request $request)
	   {      


	        $manifacturers = new Manifacturers;



	        $manifacturers->name = $request->input('name');
	        $manifacturers->companyname = $request->input('companyname');
	        $manifacturers->address = $request->input('address');
	        $manifacturers->contact = $request->input('contact');
	       


	        $manifacturers->save();
	       // 	

	              
	        return redirect()->back();
	        	  
	        
	    }



}
