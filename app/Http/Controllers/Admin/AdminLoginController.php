<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;
use Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        // $pass = Hash::make('1234'); // this was made to hash the default password
        // dd($pass);
        return view ('admin.login');
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function forget_password_submit(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);

        $admin_data = Admin::where('email',$request->email)->first();
        if(!$admin_data){
            return redirect()->back()->with('error','Email adress not found');
        }

        $token = hash('sha256', time());

        $admin_data->token = $token;
        $admin_data->update();
        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
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
        // $message.= '<a href=" '.$reset_link .'">reset link</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('admin_login')->with('success','reset mail sent successfully to your email address');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password' => 'required'
        ]);

        $credential =[
            'email' => $request->email,
            'password' => $request->password
        ];

        if ( Auth::guard('admin')->attempt(($credential))){
            return redirect()->route('admin_home');
        }else{
            return redirect()->route('admin_login')->with('error','Email or Password is not correct!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function reset_password($token,$email)
    {
        $admin_data = Admin::where('token',$token)->where('email',$email)->firstOrFail();
        if(!$admin_data){
            return redirect()->route('admin_login');
        }

        return view('admin.reset_password',compact('token','email'));
    }

    public function reset_password_submit(Request $request){
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();

        $admin_data->password = Hash::make($request->password);
        $admin_data->token =''; // remove token
        $admin_data->update();
        return redirect()->route('admin_login')->with('success','Password reseted successfully');
    
    }
}
