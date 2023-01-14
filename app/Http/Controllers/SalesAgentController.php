<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesAgentController extends Controller
{

     public function salesagent()
     {
     	
    echo "  Sales  controller";



    return view('salesagent_panel')
     }
}
