<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
use Hash;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request){
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            
        ]);

        if($request->password!=''){
            $request->validate([
                'password' => 'required|min:6',
                'retype_password' => 'required|same:password',
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            ]);
            unlink(public_path('uploads/'.$admin_data->photo));

            $ext = $request->photo->extension();
            $file_name = 'admin' . '.' .$ext;
            
            $request->file('photo')->move(public_path('uploads/'),$file_name);

            $admin_data->photo = $file_name;
        }

        
        // dd($admin_data);
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();
        return redirect()->back()->with('success','Profile updated successfully');
    }
}
