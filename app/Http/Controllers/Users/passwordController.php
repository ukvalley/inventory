<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class passwordController extends Controller
{    /**
    * Updating the password for the user.
    *
    * @param Request $request
    * @return Response
 */

    public function update(Request $request) {
      // Validate the new password length...
      $request->user()->fill([
        'password' => Hash::make($request->newPassword) // Hashing passwords
     ])->save();
  

 
    }
}
