<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobLocation;

class AdminJobLocationController extends Controller
{
    public function index(){
        $job_locations = JobLocation::get();
        return view('admin.job_location', compact('job_locations'));
    }
    public function create(){
        return view('admin.job_location_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $job_location = new JobLocation();
        $job_location->name = $request->name;
        $job_location->save();
        return redirect()->route('admin_job_location')->with('success', 'Job location Created Successfully');
    }

    public function edit($id){
        $job_location_single = JobLocation::where('id', $id)->first();
        return view('admin.job_location_edit' , compact('job_location_single'));
    }

    public function update(Request $request, $id){
        $job_location = JobLocation::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
      
        ]);
        
        $job_location->name = $request->name;
      
        $job_location->update();
        return redirect()->route('admin_job_location')->with('success', 'Job location Updated Successfully');
    }

    public function delete($id){
        JobLocation::where('id', $id)->delete();
        return redirect()->route('admin_job_location')->with('success', 'Job location Deleted Successfully');
    }
}
