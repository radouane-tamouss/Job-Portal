<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySize;

class AdminCompanySizeController extends Controller
{
    public function index(){
        $company_sizes = CompanySize::OrderBy('name','ASC')->get();
        return view('admin.company_size', compact('company_sizes'));
    }
    public function create(){
        return view('admin.company_size_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $company_size = new CompanySize();
        $company_size->name = $request->name;
        $company_size->save();
        return redirect()->route('admin_company_size')->with('success', 'Job size Created Successfully');
    }

    public function edit($id){
        $company_size_single = CompanySize::where('id', $id)->first();
        return view('admin.company_size_edit' , compact('company_size_single'));
    }

    public function update(Request $request, $id){
        $company_size = CompanySize::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
      
        ]);
        
        $company_size->name = $request->name;
      
        $company_size->update();
        return redirect()->route('admin_company_size')->with('success', 'Job size Updated Successfully');
    }

    public function delete($id){
        CompanySize::where('id', $id)->delete();
        return redirect()->route('admin_company_size')->with('success', 'Job size Deleted Successfully');
    }
}
