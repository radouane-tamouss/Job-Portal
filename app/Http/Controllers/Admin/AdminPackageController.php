<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        return view('admin.package' , compact('packages'));
    }
    public function create(){
        return view('admin.package_create');
    }
    
    public function store(Request $request){
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' =>'required'
        ]);
       $package = new Package();
       $package->package_name = $request->package_name;
       $package->package_price = $request->package_price;
       $package->package_days = $request->package_days;
       $package->package_display_time = $request->package_display_time;
       $package->total_allowed_jobs = $request->total_allowed_jobs;
       $package->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
       $package->total_allowed_photos = $request->total_allowed_photos;
       $package->total_allowed_videos = $request->total_allowed_videos;

       $package->save();
       return redirect()->route('admin_package')->with('success','Package Created Successfully!');
    }

    public function edit($id)
    {
        $package_single = Package::where('id', $id)->first();
        return view('admin.package_edit',compact('package_single'));
    }

    public function update(Request $request, $id){

        $package = Package::where('id', $id)->first();
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' =>'required'
        ]);
      
       $package->package_name = $request->package_name;
       $package->package_price = $request->package_price;
       $package->package_days = $request->package_days;
       $package->package_display_time = $request->package_display_time;
       $package->total_allowed_jobs = $request->total_allowed_jobs;
       $package->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
       $package->total_allowed_photos = $request->total_allowed_photos;
       $package->total_allowed_videos = $request->total_allowed_videos;

       $package->update();
       return redirect()->route('admin_package')->with('success','Package Updated Successfully!');
    }

    public function delete($id){
        Package::where('id',$id)->delete();
        return redirect()->route('admin_package')->with('success','Package Deleted Succesfully!');
    }
   

 
}

