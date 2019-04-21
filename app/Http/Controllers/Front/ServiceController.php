<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Service;


class ServiceController extends Controller
{
    
    // base function for admin 
    public function all()
    {
        $data['categories'] = Category::where('language_id',lang_front())->where('status','yes')->get();
        return view('front.services.index')->with($data);
    }


    // view data of specific service 
    public function category($slugcat)
    {
        $check = Category::where('language_id',lang_front())->where('slug',$slugcat)
        ->where('status','yes')->first();
        if($check)
        {
            $data['row'] = $check;
            $data['catService'] = Service::where('category_id',$check->id)
            ->where('status','yes')->paginate(15);
            return view('front.services.category')->with($data);
        }
    }


    // view data of specific service 
    public function show($slugService)
    {
        $check = Service::where('language_id',lang_front())
        ->where('status','yes')->where('slug',$slugService)->first();
        if($check)
        {
            $data['row'] = $check;
            return view('front.services.show')->with($data);
        }
    }

}
