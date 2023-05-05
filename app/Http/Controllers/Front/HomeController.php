<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\Job;


class HomeController extends Controller
{
    public function index()
    {
        $fetured_jobs = Job::where('is_featured',1)->take(6)->get();
        $page_home_data = PageHomeItem::where('id',1)->first();
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count','desc')->take(9)->get();
        $job_categories_select = JobCategory::OrderBy('name','asc')->get();
        $job_locations_select = JobLocation::OrderBy('name','asc')->get();
        return view('front.home', compact('page_home_data','job_categories','job_categories_select','job_locations_select','fetured_jobs'));
    }
}
