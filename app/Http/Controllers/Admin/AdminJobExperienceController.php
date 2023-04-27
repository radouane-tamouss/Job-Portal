<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;

class AdminJobExperienceController extends Controller
{
    public function index()
    {
        $job_experiences = JobExperience::OrderBy('id')->get();
        return view('admin.job_experience', compact('job_experiences'));
    }

    public function create()
    {
        return view('admin.job_experience_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $job_experience = new JobExperience();
        $job_experience->name = $request->name;
        $job_experience->save();
        return redirect()->route('admin_job_experience')->with('success', 'Job experience created successfully');
    }

    public function edit($id)
    {
        $job_experience_single = JobExperience::where('id', $id)->first();
        return view('admin.job_experience_edit', compact('job_experience_single'));
    }

    public function update(Request $request, $id)
    {
        $job_experience = JobExperience::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $job_experience->name = $request->name;
        $job_experience->update();
        return redirect()->route('admin_job_experience')->with('success', 'Job experience updated successfully');
    }

    public function delete($id)
    {
        JobExperience::where('id', $id)->delete();
        return redirect()->route('admin_job_experience')->with('success', 'Job experience deleted successfully');
    }
}
