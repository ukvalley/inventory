<?php

namespace App\Http\Controllers\GpsAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    // protected $redirectTo = '/home';

    public function redirectTo()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {
            return 'dashboard';
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {
            return '/';
        }
    }

    // Use ANY ONE ===> the above code OR below code
  
    //Second method to Redirect with Message ("STATUS") eg: welcome to dashboard


    protected function authenticated()
    {
        if(Auth::user()->role_as == '1') //1 = Admin Login
        {
            return redirect('dashboard')->with('status','Welcome to your dashboard');
        }
        elseif(Auth::user()->role_as == '0') // Normal or Default User Login
        {
            return redirect('/')->with('status','Logged in successfully');
        }
    }
}
