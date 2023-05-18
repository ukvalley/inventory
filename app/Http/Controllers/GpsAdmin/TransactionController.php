<?php

namespace App\Http\Controllers\GpsAdmin;
use DB;

use Illuminate\Http\Request;
use App\Models\Admin\Transaction;
use App\Models\Admin\Device;
use App\Models\Admin\Customer;
use App\Models\Admin\Users;
use App\Models\Admin\Vechicles;
use App\Models\DeviceTransfer;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuth;

use Session;

use PDF;
use load;


class TransactionController extends Controller
{

 
public function Transaction(){

  $data = Transaction::with(['sender_id','receiver_id'])->get();
    $allCustomer = Customer::get();
   
    $allVehicle = Vechicles::get();
    $allUser = Users::get();
     


        //    print_r($alldevice);die();


    return view('transaction/transaction_table', compact('data','allCustomer','allUser','allVehicle'));


}



public function transactionUpdate(Request $request)
        {
         
          foreach ($transaction as $key => $value) {

            $transaction = Transaction::find($value);
    
            $transaction->user_id = $request->sender;
    
            $transaction->save();
   
}    

}

public function pdfview_transaction(Request $request)  
{  
  $transaction = Transaction::all();
  $data = [
     'title' => 'Welcome to CodeSolutionStuff.com',
     'date' => date('m/d/Y'),
     'transaction' => $transaction
 ];
   
 $pdf = PDF::loadView('transaction.transactionpdf', $data);

 return $pdf->download('transactionpdf.pdf');



} 

//you..............

public function send(Request $request)
    {
      $user_id=Session::get('USER_ID');
      $devices = $request->select;


        $fromUser = Users::findOrFail($user_id);;
        $toUser = Users::findOrFail($request->user);

        foreach ($devices as $key => $value) {

         
      

        $gpsDevice = Device::findOrFail($value);

        // Check if the device is already blocked
        if ($gpsDevice->blocked) {
           continue;
        }

        $transfer = new DeviceTransfer([
            'from_user_id' => $fromUser->id,
            'to_user_id'   => $toUser->id,
            'gps_device_id' => $gpsDevice->id,
            'status'       => DeviceTransfer::STATUS_PENDING,
        ]);

        $transfer->save();


      }


        return response()->json(['message' => 'Device transfer request sent successfully']);
    }

   
    public function accept(Request $request,$action)
    {
        
        $device_id=$request->devices;
      //   print_r($device_id) ; die();
        if($action == 'accept')
        { 

            foreach ($device_id as $key => $value) {
                echo $value;
                $device=DeviceTransfer::find($value);

                print_r($device);

                if(Session::get('USER_ID') !== $device->to_user_id);
                {
                  //  abort(403);
                }

                $device->accept();
            }
            return response()->json(['message' => 'Device transfer request accepted successfully']);

        }
        if($action == 'reject')
        {


            foreach ($device_id as $key => $value) {
                $device=DeviceTransfer::findOrFail($value);

                if (Session::get('USER_ID') !== $device->to_user_id) {
                  //  abort(403);
                }

                $device->reject();
            }

            return response()->json(['message' => 'Device transfer request rejected successfully']);


        }
      

        return response()->json(['message' => 'Device transfer request accepted successfully']);
    }

    public function reject(DeviceTransfer $transfer)
    {
        // Only the to_user can reject a transfer request
        if (Auth::id() !== $transfer->to_user_id) {
            abort(403);
        }

        $transfer->reject();

        return response()->json(['message' => 'Device transfer request rejected successfully']);
    }










    public function index(Request $request)
    {
        $deviceTransfers = DeviceTransfer::all();
        return view('/acceptdevice', compact('deviceTransfers'));
    }

    public function view_acceptdevice()
    {
       $data=DB::table('DeviceTransfer')->get();
       //print_r($data); die();
       return view('/acceptdevice')->with(compact('data',)); 
    }
   
}