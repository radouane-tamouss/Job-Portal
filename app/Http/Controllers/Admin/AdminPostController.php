<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Post;
class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','DESC')->paginate(10);
        return view('admin.post',compact('posts'));
    }

    public function create(){
        return view('admin.post_create');
    }

    public function store(Request $request){
        $request->validate([
            'heading' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);
        $obj = new Post();

        $ext = $request->file('photo')->extension();
        $final_name = 'post_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->total_view = 0;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->save();

        return redirect()->route('admin_post')->with('success', 'Data is saved successfully.');
        
    }

    public function update(Request $request, $id)
    {
        $obj = Post::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'slug' => ['required','alpha_dash',Rule::unique('posts')->ignore($id)],
            'short_description' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'post_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->update();

        return redirect()->route('admin_post')->with('success', 'Data is updated successfully.');

    }
    public function delete($id){
        Post::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Post is deleted successfully.');
    }

}
