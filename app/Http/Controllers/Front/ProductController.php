<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Product\Size;


class ProductController extends Controller
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
            $data['allProducts'] = Product::where('category_id',$check->id)
            ->where('status','yes')->paginate(20);

            // get sizes
            $data['sizes'] = Size::where('language_id',lang_front())->get();

            //  get three products that has offers random

            $data['offers'] = Product::where('offer','!=','')->where('language_id',lang_front())
            ->where('status','yes')->take(3)->orderByRaw("RAND()")->get();

            //  get three products that has offers random

            $data['fetured'] = Product::where('featured','yes')->where('language_id',lang_front())
            ->where('status','yes')->take(3)->orderByRaw("RAND()")->get();

            return view('front.product.cat')->with($data);
        }
    }





    // view data of specific service 
    public function subCategory($slugcat,$slugSubCat)
    {
        //  check from category 
        $check = Category::where('language_id',lang_front())->where('slug',$slugcat)
        ->where('status','yes')->first();

        if($check)
        {
            //  check from sub category 
            $checkSub = SubCategory::where('language_id',lang_front())->where('slug',$slugSubCat)
            ->where('category_id',$check->id)
            ->where('status','yes')->first();

            if($checkSub)
            {
                    $data['row'] = $check;
                    $data['rowSub'] = $checkSub;
                    $data['allProducts'] = Product::where('sub_category_id',$checkSub->id)
                    ->where('status','yes')->paginate(20);

                    // get sizes
                    $data['sizes'] = Size::where('language_id',lang_front())->get();

                    //  get three products that has offers random

                    $data['offers'] = Product::where('offer','!=','')->where('language_id',lang_front())
                    ->where('status','yes')->take(3)->orderByRaw("RAND()")->get();

                    //  get three products that has offers random

                    $data['fetured'] = Product::where('featured','yes')->where('language_id',lang_front())
                    ->where('status','yes')->take(3)->orderByRaw("RAND()")->get();

                    return view('front.product.sub')->with($data);

             }
        }
    }







    // view data of specific product 
    public function show($slugcat,$slugSubCat,$slugProduct)
    {
        //  check from category 
        $check = Category::where('language_id',lang_front())->where('slug',$slugcat)
        ->where('status','yes')->first();

        if($check)
        {
            //  check from sub category 
            $checkSub = SubCategory::where('language_id',lang_front())->where('slug',$slugSubCat)
            ->where('category_id',$check->id)
            ->where('status','yes')->first();

            if($checkSub)
            {

                //  check from product 
                $checkProduct = Product::where('language_id',lang_front())->where('slug',$slugProduct)
                ->where('category_id',$check->id)
                ->where('sub_category_id',$checkSub->id)
                ->where('status','yes')->first();

                if($checkProduct)
                {
                    $data['row'] = $checkProduct;
                    $data['rowSub'] = $checkSub;
                    $data['rowCat'] = $check;
                    //  get three products that has offers random
                    $data['fetured'] = Product::where('featured','yes')->where('language_id',lang_front())
                    ->where('status','yes')->take(4)->orderByRaw("RAND()")->get();

                    //  get three products that has offers random
                    $data['related'] = Product::where('language_id',lang_front())
                    ->where('sub_category_id',$checkSub->id)
                    ->where('status','yes')->take(4)->orderByRaw("RAND()")->get();

                    return view('front.product.show')->with($data);
                }


            }
        }
    }










    public function filter(Request $request)
    {
        if($request->ajax())
        {
            $min = (int) $request->min;
            $max = (int) $request->max;

            $data['allProducts'] = Product::where('featured','yes')
            ->where('language_id',lang_front())
            ->where('status','yes')
            ->where('price','>=',$min)
            ->where('price','<=',$max)
            ->take(20)->orderByRaw("RAND()")->get();
            
            return view('front.product.ajax.filter')->with($data);
        }
    }


}
