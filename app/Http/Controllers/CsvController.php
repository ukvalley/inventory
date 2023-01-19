<?php

namespace App\Http\Controllers;
use App\Http\Requests\CsvImportRequest;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Customer;
use App\Models\Admin\Vechicles;
use App\Models\Admin\Users;
use App\Models\Admin\Device;
use App\Models\Admin\Purchase;
use App\Models\Admin\Sales;
use App\Models\Admin\SimTypes;
use App\Models\Admin\Records;
use App\Models\CsvData;


class CsvController extends Controller
{
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
 
     $csv_data = array_slice($data, 0, 2);
     return view('import_fields', compact('csv_data', 'csv_data_file'));
 }
 
     public function processImport(Request $request)
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
 
       
 
     public function csvPurchaseProcess($csv_row_data)
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
       
 
 
 
     
 
       $this->purchaseOrder($make,$ice_id,$imei,$sim_1_type,$sim_2_type,$received_date,$activation_date,$renewal_date,$user_id,$purchase_from,$amount);
 
 
     }
}
