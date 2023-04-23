<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view ('front.login');
    }

    public function company_login_submit(Request $request)
    {
        
        $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential =[
            'username' => $request->username,
            'password' => $request->password
        ];

        if ( Auth::guard('company')->attempt(($credential))){ //
            return redirect()->route('company_dashboard');
        }else{
            return redirect()->route('login')->with('error','Email or Password is not correct!');
        }
    }

   

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }
  
    
}
 