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
    public function forget_password()
    {
        return view('front.forget_password');
    }
  
    
}
 