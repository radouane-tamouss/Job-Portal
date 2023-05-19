<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\WebsiteMail;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $data = $request->validate([
            'email' => 'required'
        ]);

        $check = Subscriber::where('email',$request->email)->where('status',1)->count();
        if($check>0){
            return redirect()->back()->with('error','email already exists!');
        }
        else{
            $token = hash('sha256', time());
                $obj = new Subscriber();
                $obj->email = $request->email;
                $obj->token = $token;
                $obj->status = 0;
                $obj->save();
        
                $verification_link = url('subscriber/verify/'.$request->email.'/'.$token);
        
                $subject = 'Subscriber Verification';
                $message ='
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
                                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;,sans-serif;">Newsletter Subscription Verification</h1>
                                <span
                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                Thank you for subscribing to our newsletter! We\'re thrilled to have you join our community. To verify your email 
                                address and start receiving our newsletter, simply click on the following link:
                                </p>
                                <a href="'.$verification_link .'"
                                    style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Verify Email</a>
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
                \Mail::to($request->email)->send(new Websitemail($subject,$message));
        
                // return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription']);
                return redirect()->back()->with('success','Please check your email to confirm subscription');
        }
       
    //     $validator = \Validator::make($request->all(),[
    //         'email' => 'required|email|unique'
    //     ]);
    
    //     if(!$validator->passes()) 
    //     {
    //         return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
    //     } 
    //     else
    //     {
    //         $check = Subscriber::where('email',$request->email)->where('status',1)->count();
    //         if($check>0) 
    //         {
    //             return response()->json(['code'=>2,'error_message_2'=>(array)'Subscriber already exists!']);
    //         }
    //         else 
    //         {
    //             $token = hash('sha256', time());
    //             $obj = new Subscriber();
    //             $obj->email = $request->email;
    //             $obj->token = $token;
    //             $obj->status = 0;
    //             $obj->save();
        
    //             $verification_link = url('subscriber/verify/'.$request->email.'/'.$token);
        
    //             $subject = 'Subscriber Verification';
    //             $message = 'Please click on the link below to confirm subscription:<br>';
    //             $message .= '<a href="'.$verification_link.'">';
    //             $message .= $verification_link;
    //             $message .= '</a>';
        
    //             \Mail::to($request->email)->send(new Websitemail($subject,$message));
        
    //             return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subscription']);
    //         }
    //     }
    }
    
    public function verify($email,$token)
    {
        $subscriber_data = Subscriber::where('email',$email)->where('token',$token)->first();
    
        if($subscriber_data) 
        {
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();
            Subscriber::where('email',$email)->where('status',0)->delete();
            return redirect()->route('home')->with('success', 'Your subscription is verified successfully!');
        }
        else 
        {
            return redirect()->route('home');
        }
    }
}

