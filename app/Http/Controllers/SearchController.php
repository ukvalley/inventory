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
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('device')
                    ->where('make', 'like', '%'.$query.'%')
                    ->orWhere('ice_id', 'like', '%'.$query.'%')
                    ->orWhere('imei', 'like', '%'.$query.'%')
                  
                    ->get();
                    
            } else {
                $data = DB::table('device')
                    ->orderBy('id', 'desc')
                    ->get();
            }
             
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
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
    }
}
