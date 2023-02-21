<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Admin\Device;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function index()
    {
        return view('transfer_transaction');
    }
 
    function action(Request $request)
    {
        
        
            $output = '';
            $query = $request->get('query');
            if($query != '') 
            {
                
                $data = Device::
                      where('status','=','unsold')

                       ->where(function($query1) use ($query){
                            $query1->where('make', 'LIKE', '%'.$query.'%')
                                  ->orWhere('ice_id', 'LIKE', '%'.$query.'%')
                                  ->orWhere('imei', 'LIKE', '%'.$query.'%');
                        })

                    ->get();

                    
                    
            } 
            else 
            {
                $data = Device::where('status','=','unsold')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();

                   
            }
             
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td><input type="checkbox" value="'.$row->id.'" name="select[]"></td>
                    <td>'.$row->id.'</td>
                    <td>'.$row->make.'</td>
                    <td>'.$row->ice_id.'</td>
                    <td>'.$row->imei.'</td>
                   
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        
    }

    //sale_device 

    function sales_index()
    {
        return view('device_sale');
    }
    
    function sales_action(Request $request)
    {
        
        
            $output = '';
            $query = $request->get('query');
            if($query != '') 
            {
                
                $data = Device::
                      where('status','=','unsold')

                       ->where(function($query1) use ($query){
                            $query1->where('imei', 'LIKE', '%'.$query.'%')
                                  ->orWhere('ice_id', 'LIKE', '%'.$query.'%')
                                  ->orWhere('user_id', 'LIKE', '%'.$query.'%');
                        })

->get();

                    
                    
            } 
            else 
            {
                $data = Device::where('status','=','unsold')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();

                   
            }
             
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td><input type="checkbox" value="'.$row->id.'" name="select[]"></td>
                    <td>'.$row->id.'</td>
                    <td>'.$row->imei.'</td>
                    <td>'.$row->ice_id.'</td>
                    <td>'.$row->user_id.'</td>
                   
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        
    }
 
}
