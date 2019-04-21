<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Product\Size;


class CartController extends Controller
{
    

    // add to cart 
    public function add(Request $request)
    {
       if($request->ajax())
       {

            $check = Product::where('status','yes')->where('language_id',lang_front())
            ->where('id',$request->prodId)->first();

            if($check)
            {
                $checkCart = \Cart::get($request->prodId);
                if($checkCart)
                {
                
                    $message['success'] = trans('frontSite.itemAddedToCart');
                    return response()->json($message);
                }
                else
                {
                    if($check->offer){ $price =  $check->price - ($check->price * ($check->offer/100)) ;  }
                     else {$price = $check->price;} 

                    \Cart::add(array(
                        'id' => $request->prodId,
                        'name' => $check->name,
                        'price' => $price,
                        'quantity' => 1,
                        'attributes' => array('img' => $check->img,
                        'catSlug' => $check->category->slug,
                        'subCatslug' => $check->sub->slug,
                        'slug' => $check->slug),
                        
                        

                    ));

                    $data['row'] = $check;
                    // dd(\Cart::getContent());
                    return view('front.product.ajax.cart')->with($data);
                }
                
               
            }

            
       }
    }



    public function remove(Request $request)
    {
        if($request->ajax())
        {

            $check = Product::where('status','yes')->where('language_id',lang_front())
            ->where('id',$request->itemId)->first();

            if($check)
            {
                $checkCart = \Cart::get($request->itemId);
                if($checkCart)
                {
                    \Cart::remove($request->itemId);
                    $message['success'] = trans('frontSite.itemCartRemoved');
                    return response()->json($message);
                }
            }
        }
    }







    public function show()
    {
        return view('front.product.cart');
    }






    //  update datA IN CART
    public function update(Request $request)
    {
        // $request->validate([])
        if($request->qunt)
        {
            $i=0;
            foreach($request->qunt as $q)
            {

                \Cart::update($request->prodCart[$i], array(
                  'quantity' => array(
                      'relative' => false,
                      'value' => $q
                  ),
                ));
                $i++;
            }
                return back();
            
        }
    }


    public function clear()
    {
        \Cart::clear();
        return back();
    }




    public function delete($id)
    {
        $checkCart = \Cart::get($id);
        if($checkCart)
        {
            \Cart::remove($id);
        }

        return back();
       
    }





}
