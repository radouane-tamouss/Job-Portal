<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIndustry;

class AdminCompanyIndustryController extends Controller
{
    public function index(){
        $company_industries = CompanyIndustry::OrderBy('name','ASC')->get();
        return view('admin.company_industry', compact('company_industries'));
    }
    public function create(){
        return view('admin.company_industry_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $company_industry = new CompanyIndustry();
        $company_industry->name = $request->name;
        $company_industry->save();
        return redirect()->route('admin_company_industry')->with('success', 'Job industry Created Successfully');
    }

    public function edit($id){
        $company_industry_single = CompanyIndustry::where('id', $id)->first();
        return view('admin.company_industry_edit' , compact('company_industry_single'));
    }

    public function update(Request $request, $id){
        $company_industry = CompanyIndustry::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
      
        ]);
        
        $company_industry->name = $request->name;
      
        $company_industry->update();
        return redirect()->route('admin_company_industry')->with('success', 'Job industry Updated Successfully');
    }

    public function delete($id){
        CompanyIndustry::where('id', $id)->delete();
        return redirect()->route('admin_company_industry')->with('success', 'Job industry Deleted Successfully');
    }
}
