<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Blog;


class BlogController extends Controller
{
    
    // base function for admin 
    public function index()
    {
        $data['posts'] = Blog::select('name','slug','small_description','img','created_at')
        ->where('status','yes')
        ->where('language_id',lang_front())->paginate(6);

        $data['latest'] = Blog::select('name','slug')
        ->where('language_id',lang_front())->latest()->take(6)->get();

        return view('front.blog.index')->with($data);
    }




    // view data of specific service 
    public function show($slugBlog)
    {
        $check = Blog::where('language_id',lang_front())
        ->where('status','yes')->where('slug',$slugBlog)->first();
        if($check)
        {
            $data['latest'] = Blog::select('name','slug')->where('status','yes')
            ->where('language_id',lang_front())->latest()->take(6)->get();
            $data['row'] = $check;
            return view('front.blog.show')->with($data);
        }
    }

}
