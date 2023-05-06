<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use App\Models\Advertisement;
use App\Models\PageOtherItem;
use App\Models\Order;
use App\Mail\Websitemail;


class CompanyListingController extends Controller
{
    public function index(Request $request){
        // dd($request->all());

        
        
        $company_size = CompanySize::orderBy('id','desc')->get();
        $company_industries = CompanyIndustry::orderBy('id','desc')->get();
        $company_locations = CompanyLocation::orderBy('id','desc')->get();
        $companies = Company::withCount('rJob')->orderBy('id','desc');
    
        if($request->name != null) {
            $companies = $companies->where('company_name','LIKE','%'.$request->name.'%');
        }
        if($request->industry != null){
            $companies = $companies->where('company_industry_id',$request->industry); 
        }
        if($request->location != null){
            $companies = $companies->where('company_location_id',$request->location); 
        }
        if($request->size != null){
            $companies = $companies->where('company_size_id',$request->size); 
        }

        $companies = $companies->paginate(12);
        // dd($companies);
        
       

        return view('front.company_listing',compact('company_size','company_industries','company_locations','companies'
        )); // compact('jobs') is same as ['jobs'=>$jobs]
    }

    public function company_detail($id){

        $company = Company::withCount('rJob')->where('id',$id)->first();
        $company_photos = CompanyPhoto::where('company_id',$id)->get();
        $company_videos = CompanyVideo::where('company_id',$id)->get();
        $open_positions = Job::where('company_id',$id)->get()->take(2);

        

        return view('front.company',compact('company','open_positions','company_videos','company_photos'));
    }

    public function send_email(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required',
        ]);


        $subject = 'Enquiry from'. $request->name;
            $message = '<!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Enquiry From: '.$request->name.'</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        line-height: 1.4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .header h1 {
                        color: #000000;
                        font-size: 24px;
                        font-weight: bold;
                        line-height: 1.3;
                        margin-top: 20px;
                        margin-bottom: 20px;
                    }
                    .content p {
                        color: #000000;
                        font-size: 16px;
                        line-height: 1.5;
                    }
                </style>
            </head>
            <body style="background-color: #f6f6f6;">
                <div class="container" style="background-color: #f6f6f6;">
                   
                    <div class="content">
                        <p>Name: '.$request->name.'</p>
                        <p>Email: '.$request->email.'</p>
                        <p>Phone: '.$request->phone.'</p>
                        <p>Message:</p>
                        <p>'.$request->message.'</p>
                    </div>
                </div>
            </body>
            </html>';

        

        // dd($request->all());

        \Mail::to($request->company_email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','Email is sent successfully!');

        
         
    }
}
