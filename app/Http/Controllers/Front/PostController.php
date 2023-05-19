<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('front.blog',compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->first();
    
        // Check if the session has already tracked this post
        $viewedPosts = session()->get('viewedPosts', []);
    
        if (!in_array($post->id, $viewedPosts)) {
            // Increment total_view only if the post has not been viewed in the current session
            $post->total_view += 1;
    
            // Add the post ID to the viewedPosts session array
            $viewedPosts[] = $post->id;
            session()->put('viewedPosts', $viewedPosts);
    
            // Save the updated post
            $post->save();
        }
    
        return view('front.post', compact('post'));
    }
}
