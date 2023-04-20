<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;

class AdminHomePageController extends Controller
{
    public function index(){
        $page_home_data = PageHomeItem::where('id',1)->first();
        return view('admin.page_home', compact('page_home_data'));
    }

    public function update(Request $request)
    {
        $home_page_data = PageHomeItem::where('id',1)->first();
        $request->validate([
            'heading' => 'required',
            'job_title' => 'required',
            'job_category' => 'required',
            'search' => 'required'
        ]);

        if($request->hasFile('background')){
            $request->validate([
                'background' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            unlink(public_path('uploads/'.$home_page_data->background));

            $ext = $request->background->extension();
            $file_name = 'banner_home' . '.' .$ext;
            
            $request->file('background')->move(public_path('uploads/'),$file_name);

            $home_page_data->background = $file_name;
        }

        $home_page_data->heading = $request->heading;
        $home_page_data->text = $request->text;
        $home_page_data->job_title = $request->job_title;
        $home_page_data->job_category = $request->job_category;
        $home_page_data->job_location = $request->job_location;
        $home_page_data->search = $request->search;
        $home_page_data->update();
        
        return redirect()->back()->with('success','Home page updated successfully');

    }
}
