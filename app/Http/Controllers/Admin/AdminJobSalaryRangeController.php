<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSalaryRange;

class AdminJobSalaryRangeController extends Controller
{
    public function index(){
        $job_salary_ranges = JobSalaryRange::get();
        return view('admin.job_salary_range', compact('job_salary_ranges'));
    }
    public function create(){
        return view('admin.job_salary_range_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $job_salary_range = new JobSalaryRange();
        $job_salary_range->name = $request->name;
        $job_salary_range->save();
        return redirect()->route('admin_job_salary_range')->with('success', 'Job Salary Range Created Successfully');
    }

    public function edit($id){
        $job_salary_range_single = JobSalaryRange::where('id', $id)->first();
        return view('admin.job_salary_range_edit' , compact('job_salary_range_single'));
    }

    public function update(Request $request, $id){
        $job_salary_range = JobSalaryRange::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
      
        ]);
        
        $job_salary_range->name = $request->name;
      
        $job_salary_range->update();
        return redirect()->route('admin_job_salary_range')->with('success', 'Job Salary Range Updated Successfully');
    }

    public function delete($id){
        JobSalaryRange::where('id', $id)->delete();
        return redirect()->route('admin_job_salary_range')->with('success', 'Job Salary Range Deleted Successfully');
    }
}
