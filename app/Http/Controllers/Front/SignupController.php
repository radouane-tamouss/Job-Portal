<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Candidate;
use App\Mail\Websitemail;

use Hash;
use Auth;


class SignupController extends Controller
{
    public function index(){
        if(Auth::guard('company')->check())
        {
            return redirect()->route('company_dashboard');
        }
        if(Auth::guard('candidate')->check())
        {
            return redirect()->route('candidate_dashboard');
        } // if user is already logged in then redirect to dashboard
        return view('front.signup');
    }

    public function company_signup_submit(Request $request){
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = hash('sha256',time());

        $obj = new Company();
        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status=0; 
        $obj->save();

        $verify_link = url('company_signup_verify/'.$token.'/'.$request->email);
        $subject = 'Company Signup Verification';
        $message = 'Hi, Click on the following link to reset your password : <br>';
        $message.= '<a href=" '.$verify_link .'">reset link</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('login')->with('success','An confirmation email sent to your email, please validate your account!');


    }

    public function company_signup_verify($token,$email){
      
        $company_data = Company::where('token',$token)->where('email',$email)->firstOrFail();
        if(!$company_data){
            return redirect()->route('login')->with('error','Invalid token or email address');
        }
        $company_data->token ='';
        $company_data->status=1;
        $company_data->update();
        return redirect()->route('login')->with('success','your email is verified successfully!');
    }

    public function candidate_signup_submit(Request $request){
        $request->validate([
            // 'candidate_name' => 'required',
            'name' => 'required',
            'username' => 'required|unique:candidates',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = hash('sha256',time());

        $obj = new Candidate();
        
        $obj->name = $request->name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status=0; 
        $obj->save();

        $verify_link = url('candidate_signup_verify/'.$token.'/'.$request->email);
        $subject = 'Candidate Signup Verification';
        $message = 'Hi, Click on the following link to reset your password : <br>';
        $message.= '<a href=" '.$verify_link .'">reset link</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('login')->with('success','An confirmation email sent to your email, please validate your account!');


    }


    public function candidate_signup_verify($token,$email){
      
        $candidate_data = Candidate::where('token',$token)->where('email',$email)->firstOrFail();
        if(!$candidate_data){
            return redirect()->route('login')->with('error','Invalid token or email address');
        }
        $candidate_data->token ='';
        $candidate_data->status=1;
        $candidate_data->update();
        return redirect()->route('login')->with('success','your email is verified successfully!');
    }
}
