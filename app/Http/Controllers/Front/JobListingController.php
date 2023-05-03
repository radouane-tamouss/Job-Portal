<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSalaryRange;

class JobListingController extends Controller
{
    public function index(Request $request){
        // dd($request->all());

        $job_salary_ranges = JobSalaryRange::orderBy('id','desc')->get();
        $form_title = $request->title;
        $form_location = $request->location;
        $form_category = $request->category;
        $jobs = Job::orderBy('id','desc');

        if($form_title != null){
          $jobs = $jobs->where('title','like','%'.$form_title.'%'); // use like because it is a string
        }

        if($form_location != null){
          $jobs = $jobs->where('job_location_id','like','%'.$form_location.'%'); // use like because it is a number
        }

        if($form_category != null){
          $jobs = $jobs->where('job_category_id',$form_category); // no need to use like because it is a number
        }

        $jobs = $jobs->paginate(12);
        $jobs = $jobs->appends($request->all()); // to keep the search query in pagination

        return view('front.job_listing',compact('jobs','job_salary_ranges')); // compact('jobs') is same as ['jobs'=>$jobs]
    }
}
