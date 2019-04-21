<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use DB;

class HomeController extends Controller
{
    
    // base function for admin 
    public function index()
    {
        $data['slider'] = Slider::select('name','description','img','link')
        ->where('status','yes')->orderBy('sort')
        ->where('language_id',lang_front())->take(3)->get();

        $data['latest'] = Product::select('id','name','price','img','offer','category_id','slug','sub_category_id')
        ->where('status','yes')->where('show_in_homePage','yes')
        ->where('language_id',lang_front())->orderBy(DB::raw('RAND()'))
        ->take(10)->get();

        
        $data['posts'] = Blog::select('name','small_description','img','slug','created_at')
        ->where('status','yes')->orderBy('sort')
        ->where('language_id',lang_front())->take(2)->get();

        return view('front.index')->with($data);
    }



    // base function for admin 
    public function about()
    {
        
        return view('front.static.about');
    }

}
