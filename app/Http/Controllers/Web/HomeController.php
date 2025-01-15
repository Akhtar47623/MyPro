<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs=Blog::latest()->get();
        return view('front/index',compact('blogs'));
    }
    public function blogs(){
        $blogs=Blog::all();
        return view('front/blog-grid',compact('blogs'));
    }
    public function singleBlog($slug){
        $blog=Blog::where('slug',$slug)->first();
        return view('front/blog-single',compact('blog'));
    }
}
