<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use Auth;
use Hash;
use Illuminate\Validation\Rule;


class CandidateController extends Controller
{
    public function index(){
        return view('candidate.dashboard');
    }

    public function edit_profile(){
        $candidate = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
        return view('candidate.edit_profile',compact('candidate'));
    }

    public function edit_password(){
        return view('candidate.edit_password');
    }
    public function candidate_edit_password_update(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        if(!Hash::check($request->old_password, $obj->password)){
            return redirect()->back()->with('error', 'old password not match');
        }else{
            $obj->password = hash::make($request->new_password);
            $obj->update();
            return redirect()->back()->with('success','Password is updated successfully');
        }
        
    }

    public function edit_profile_update(Request $request){
        $candidate = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
        $id = $candidate->id;
        $request->validate([
            'name' => 'required',
            'email' => ['required','email',Rule::unique('candidates')->ignore($id)],
            'username' => ['required',Rule::unique('candidates')->ignore($id)],
            'phone' => 'required',
            'website' => 'url',
        ]);

        if($request->hasfile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif'
            ]);

            if($candidate->photo != ''){
                unlink(public_path('uploads/'.$candidate->photo));
            }
            $ext = $request->file('photo')->extension();
            $final_name = "candidate_profile".time().".".$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $candidate->photo = $final_name;
        }

        $candidate->name  = $request->name;
        $candidate->designation = $request->designation;
        $candidate->email = $request->email;
        $candidate->username = $request->username;
        $candidate->phone = $request->phone;
        $candidate->biography = $request->biography;
        $candidate->country = $request->country;
        $candidate->address = $request->address;
        $candidate->city = $request->city;
        $candidate->gender = $request->gender;
        $candidate->date_of_birth = $request->date_of_birth;
        $candidate->website = $request->website;
        
        $candidate->update();
        return redirect()->back()->with('success', 'Candidate Profile Updated Successfully');
    }

    public function education(){
        $educations = CandidateEducation::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.education',compact('educations'));
    }
}