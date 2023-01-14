<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnicianController extends Controller
{  

public function technician(){

	echo "  T  controller";

	return view('technician_panel');
}


}
