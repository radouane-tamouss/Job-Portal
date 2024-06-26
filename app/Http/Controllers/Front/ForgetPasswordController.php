<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Company;
use App\Models\Candidate;
use App\Mail\Websitemail;
use Hash;

class ForgetPasswordController extends Controller
{
    public function company_forget_password(){
        if(Auth::guard('company')->check())
        {
            return redirect()->route('company_dashboard');
        } // if user is already logged in then redirect to dashboard
        
        return view('front.company_forget_password');
    }
    public function company_forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $company_data = Company::where('email',$request->email)->first();
        if(!$company_data){
            return redirect()->back()->with('error','Email adress not found');
        }

        $token = hash('sha256', time());

        $company_data->token = $token;
        $company_data->update();
        $reset_link = url('reset-password/company/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = '
        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family:\'Open Sans\', sans-serif;">
        <tr>
            <td>
        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                          <a href="" title="logo" target="_blank">
                            <img width="200" src="http://127.0.0.1:8000/uploads/logo.png" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                <tr>
                    <td style="height:40px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding:0 35px;">
                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;,sans-serif;">You have
                            requested to reset your password</h1>
                        <span
                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                            We cannot simply send you your old password. A unique link to reset your
                            password has been generated for you. To reset your password, click the
                            following link and follow the instructions.
                        </p>
                        <a href="'.$reset_link .'"
                            style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                            Password</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:40px;">&nbsp;</td>
                </tr>
            </table>
            
            </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.az-networking.com</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
                </td>
        </tr>
    </table>
   
</body>';
//this is for html mail

        // $message.= '<a href=" '.$reset_link .'">reset link</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('login')->with('success','reset mail sent successfully to your email address');
    }

    public function company_reset_password($token,$email)
    {
        $company_data = Company::where('token',$token)->where('email',$email)->firstOrFail();
        if(!$company_data){
            return redirect()->route('login');
        }

        return view('front.company_reset_password',compact('token','email'));
    }

    public function company_reset_password_submit(Request $request){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $company_data = Company::where('token',$request->token)->where('email',$request->email)->first();

        $company_data->password = Hash::make($request->password);
        $company_data->token =''; // remove token 
        $company_data->update();
        return redirect()->route('login')->with('success','Password reseted successfully!');
    
    }

    //candidate functions 



    public function candidate_forget_password(){
        if(Auth::guard('candidate')->check())
        {
            return redirect()->route('candidate_dashboard');
        } 
        return view('front.candidate_forget_password');
    }
    public function candidate_forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $candidate_data = Candidate::where('email',$request->email)->first();
        if(!$candidate_data){
            return redirect()->back()->with('error','Email adress not found');
        }

        $token = hash('sha256', time());

        $candidate_data->token = $token;
        $candidate_data->update();
        $reset_link = url('reset-password/candidate/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = '
        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family:\'Open Sans\', sans-serif;">
        <tr>
            <td>
        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                          <a href="" title="logo" target="_blank">
                            <img width="200" src="http://127.0.0.1:8000/uploads/logo.png" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                <tr>
                    <td style="height:40px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding:0 35px;">
                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;,sans-serif;">You have
                            requested to reset your password</h1>
                        <span
                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                            We cannot simply send you your old password. A unique link to reset your
                            password has been generated for you. To reset your password, click the
                            following link and follow the instructions.
                        </p>
                        <a href="'.$reset_link .'"
                            style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                            Password</a>
                    </td>
                </tr>
                <tr>
                    <td style="height:40px;">&nbsp;</td>
                </tr>
            </table>
            
            </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.az-networking.com</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
                </td>
        </tr>
    </table>
   
</body>';
//this is for html mail

        // $message.= '<a href=" '.$reset_link .'">reset link</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('login')->with('success','reset mail sent successfully to your email address');
    }

    public function candidate_reset_password($token,$email)
    {
        $candidate_data = Candidate::where('token',$token)->where('email',$email)->firstOrFail();
        if(!$candidate_data){
            return redirect()->route('login');
        }

        return view('front.candidate_reset_password',compact('token','email'));
    }

    public function candidate_reset_password_submit(Request $request){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $candidate_data = Candidate::where('token',$request->token)->where('email',$request->email)->first();

        $candidate_data->password = Hash::make($request->password);
        $candidate_data->token =''; // remove token 
        $candidate_data->update();
        return redirect()->route('login')->with('success','Password reseted successfully!');
    
    }

    
}
 