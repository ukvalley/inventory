<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
     

     public function  office()
     {

       echo "  Office  controller";

	
      return view('/office_panel')
     }
}
