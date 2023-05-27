<?php

namespace App\Http\Controllers\GpsAdmin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\CsvImportRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Sales;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Manifacturer;

use App\Models\Admin\Records;
use App\Models\CsvData;


class PurchaseOrderController extends Controller
{
    



    private function change_date_format($date)
    {
           $chnage_date = strtotime($date);
 
           $chnage_date_f = date('M d, Y',( $chnage_date ) );
             

           return $chnage_date_f;
    }

   public function purchaseformPost(Request $request)
   {  
      
 

      $manufactured_by = $request->manufactured_by;
      $ice_id = $request->ice_id;
      $imei = $request->imei;
      $sim_1_type = $request->sim_1_type;
      $sim_2_type = $request->sim_2_type;
      $activation_date = $this->change_date_format($request->activation_date);
      $received_date = $this->change_date_format($request->received_date);
      $renewal_date = $this->change_date_format($request->renewal_date);

     
      $user_id = $request->user_id;
      $purchase_from = $request->purchase_from;
      $amount = $request->amount;


      $this->purchaseOrder($manufactured_by,$ice_id,$imei,$sim_1_type,$sim_2_type,$received_date,$activation_date,$renewal_date,$user_id,$customer_id);
    
      
   }


   public function importCsv()
   {

      $csv_data = [];

      foreach($csv_data as $key=>$value)
      {
         $this->purchaseOrder($manufactured_by,$ice_id,$sim1,$sim2,$imei,$sim_1_type,$sim_2_type,$user_id,$customer_id);
      }

   }


    
    ///recored update purchase
    public function purchaseOrder($manufactured_by,$ice_id,$imei,$sim1,$sim2,$sim_1_type,$sim_2_type,$received_date,$activation_date,$renewal_date,$user_id,$customer_id){

         // purchase validation add here

      //create device information

           $device= new Device;

           $device->manufactured_by = $manufactured_by;
           $device->ice_id = $ice_id;
           $device->imei = $imei;
           $device->sim1 = $sim1;
           $device->sim2 = $sim2;

           $device->sim_1_type = $sim_1_type;
           $device->sim_2_type = $sim_2_type;
           $device->activation_date =$this->change_date_format($activation_date);
	       $device->received_date =$this->change_date_format($received_date);
	       $device->renewal_date = $this->change_date_format($renewal_date);
	        
          print_r($device);

           $device->save();

        
          
      
          // update records

           $record = Records::where('user_id','=',$user_id)->first();

           $update_record_device_count = $record->device_count + 1;

           $record->device_count = $update_record_device_count;

           $record->save();


           
 
 
       //purchase entry creation

       $purchase = new purchase;

       $today = date("M d, Y");

       $purchase->date = $today;
      
       $purchase->device_number = $device_id;
       $purchase->quantity = 1;
      
       $purchase->purchase_from = $purchase_from;

       $purchase->save();

    

    } 
    

    //CSV files import export Functions

    public function getImport()
    {

        return view('import');

    }
      
    
    public function parseImport(CsvImportRequest $request)
{  

    

    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
        'csv_data' => json_encode($data)
    ]);
      
     
    
    $csv_data = array_slice(($data), 0, 1);


    return view('import_fields', compact('csv_data', 'csv_data_file'));
}

    public function processImport(Request $request)
    {
      
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $key=>$row) {
        $csv_row_data = [];

        if($key==0)
        {
            continue;
        }
        
        foreach (config('app.db_fields') as $index => $field) {
          // print_r($row);
          $csv_row_data[$field] = $row[$index];
        }
        $this->csvPurchaseProcess($csv_row_data);
        
    }






    }

      

    public function csvPurchaseProcess($csv_row_data)
    {
        
     $manifacturer_data = Manifacturer::where('name','=',$csv_row_data['manufactured_by'])->first();

     $sim1_type = SimTypes::where('name','=',$csv_row_data['sim_1_type'])->first();
     $sim2_type = SimTypes::where('name','=',$csv_row_data['sim_2_type'])->first();


      $manufactured_by = $manifacturer_data->id;
      $ice_id = $csv_row_data['ice_id'];
      $imei = $csv_row_data['imei'];
      $sim1 = $csv_row_data['sim1'];
      $sim_1_type = $sim1_type->id;
      $sim2 = $csv_row_data['sim2'];
      $sim_2_type = $sim1_type->id;
      $activation_date = $csv_row_data['activation_date'];
    
      


      $this->purchaseOrder($manufactured_by,$ice_id,$sim1,$sim2,$imei,$sim_1_type,$sim_2_type,null,null,null,null,null);


    }


    public function newManifacturer(Request $request)
	   {      
	        $manifacturers = new Manifacturers;
	        $manifacturers->name = $request->input('name');
	        $manifacturers->companyname = $request->input('companyname');
	        $manifacturers->address = $request->input('address');
	        $manifacturers->contact = $request->input('contact');
	       
	        $manifacturers->save();
                   
	        return redirect()->back();
	        	  
	        
	    }


}
