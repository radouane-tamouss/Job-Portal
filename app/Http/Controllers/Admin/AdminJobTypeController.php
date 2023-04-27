<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;


class AdminJobTypeController extends Controller
{
    public function index()
    {
        $job_types = JobType::get();
        return view('admin.job_type', compact('job_types'));
    }

    public function create()
    {
        return view('admin.job_type_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $job_type = new JobType();
        $job_type->name = $request->name;
        $job_type->save();

        return redirect()->route('admin_job_type')->with('success', 'Job type created successfully');
    }

    public function edit($id)
    {
        $job_type_single = JobType::where('id', $id)->first();
        return view('admin.job_type_edit', compact('job_type_single'));
    }

    public function update(Request $request, $id)
    {
        $job_type = JobType::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        
        $job_type->name = $request->name;
        $job_type->update();

        return redirect()->route('admin_job_type')->with('success', 'Job type updated successfully');
    }

    public function delete($id)
    {
        JobType::where('id', $id)->delete();

        return redirect()->route('admin_job_type')->with('success', 'Job type deleted successfully');
    }
}
