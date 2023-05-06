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
}
