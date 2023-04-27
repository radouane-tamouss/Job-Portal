<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;


class AdminCompanyLocationController extends Controller
{
    public function index(){
        $company_locations = CompanyLocation::OrderBy('name','ASC')->get();
        return view('admin.company_location', compact('company_locations'));
    }
    public function create(){
        return view('admin.company_location_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $company_location = new CompanyLocation();
        $company_location->name = $request->name;
        $company_location->save();
        return redirect()->route('admin_company_location')->with('success', 'Job location Created Successfully');
    }

    public function edit($id){
        $company_location_single = CompanyLocation::where('id', $id)->first();
        return view('admin.company_location_edit' , compact('company_location_single'));
    }

    public function update(Request $request, $id){
        $company_location = CompanyLocation::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
      
        ]);
        
        $company_location->name = $request->name;
      
        $company_location->update();
        return redirect()->route('admin_company_location')->with('success', 'Job location Updated Successfully');
    }

    public function delete($id){
        CompanyLocation::where('id', $id)->delete();
        return redirect()->route('admin_company_location')->with('success', 'Job location Deleted Successfully');
    }
}
