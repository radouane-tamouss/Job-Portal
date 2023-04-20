<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;

class HomeController extends Controller
{
    public function index()
    {
        $page_home_data = PageHomeItem::where('id',1)->first();
        return view('front.home', compact('page_home_data'));
    }
}
