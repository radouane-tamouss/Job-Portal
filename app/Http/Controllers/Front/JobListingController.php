<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSalaryRange;
use App\Models\JobCategory;
use App\Models\JobExperience;
use App\Models\JobType;

use App\Models\JobLocation;

class JobListingController extends Controller
{
    public function index(Request $request){
        // dd($request->all());

        $job_salary_ranges = JobSalaryRange::orderBy('id','desc')->get();
        $job_categories = JobCategory::orderBy('id','desc')->get();
        $job_experiences = JobExperience::orderBy('id','desc')->get();
        $job_types = JobType::orderBy('id','desc')->get();
        $job_locations = JobLocation::orderBy('id','desc')->get();
        $form_title = $request->title;
        $form_location = $request->location;
        $form_category = $request->category;
        $form_salary_range = $request->salary_range;
        $form_job_type = $request->job_type;
        $form_job_gender = $request->gender;
        $form_job_experience = $request->experience;
        $jobs = Job::orderBy('id','desc');

        if($form_title != null){
          $jobs = $jobs->where('title','like','%'.$form_title.'%'); // use like because it is a string
        }

        if($form_category != null){
          $jobs = $jobs->where('job_category_id',$form_category); 
        }
        
        if($form_location != null){
          $jobs = $jobs->where('job_location_id','like','%'.$form_location.'%'); // use like because it is a number
        }
        if($form_salary_range != null){
            $jobs = $jobs->where('job_salary_range_id',$form_salary_range); 
        }
        if($form_job_type != null){
            $jobs = $jobs->where('job_type_id',$form_job_type); 
        }
        if($form_job_gender != null){
            if($form_job_gender == 'any'){
                $jobs = $jobs->where('job_gender','any')->orWhereNull('job_gender');
            }else{
                $jobs = $jobs->where('job_gender',$form_job_gender)->orWhere('job_gender','any');
            }
        }



        $jobs = $jobs->paginate(12);
       

        return view('front.job_listing',compact('jobs','job_salary_ranges','form_title','form_job_gender',
        'job_categories','job_experiences','job_types','job_locations','form_location','form_category','form_salary_range','form_job_type','form_job_experience'
        )); // compact('jobs') is same as ['jobs'=>$jobs]
    }
}
