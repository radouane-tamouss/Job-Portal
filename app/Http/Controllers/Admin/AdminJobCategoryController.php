<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;


class AdminJobCategoryController extends Controller
{
    public function index(){
        $job_categories = JobCategory::get();
        return view('admin.job_category', compact('job_categories'));
    }
    public function create(){
        return view('admin.job_category_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);
        $job_category = new JobCategory();
        $job_category->name = $request->name;
        $job_category->icon = $request->icon;
        $job_category->save();
        return redirect()->route('admin_job_category')->with('success', 'Job Category Created Successfully');
    }

    public function edit($id){
        $job_category_single = JobCategory::where('id', $id)->first();
        return view('admin.job_category_edit' , compact('job_category_single'));
    }

    public function update(Request $request, $id){
        $job_category = JobCategory::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);
        
        $job_category->name = $request->name;
        $job_category->icon = $request->icon;
        $job_category->update();
        return redirect()->route('admin_job_category')->with('success', 'Job Category Updated Successfully');
    }
}
