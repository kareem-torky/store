<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Product\Size;
use App\Models\Area\Gov;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;


class OrderController extends Controller
{
    

   public function checkout()
   {
       $data['govs'] = Gov::select('id','name')->get();
       return view('front.order.checkout')->with($data);
   }

   public function sendOrder(Request $request)
   {

        // dd($request->all());
      $request->validate([

            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'address'=>'required|string|max:300',
            'mobile'=>'required|numeric|digits_between:10,12',
      ]);


        $data = new Order();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['mobile'] = $request->mobile;
        if(clientAuth()->user())
        {
          $data['client_id'] = clientAuth()->user()->id;
        }
        $data->save();

        foreach(\Cart::getContent() as $cart)
        {
            $content = new OrderContent();
            $content->order_id = $data->id;
            $content->product_id = $cart->id;
            $content->quantity = $cart->quantity;

            $content->save();
        }

        \Cart::clear();
        $message['success'] = trans('frontSite.orderSuccess');
        return response()->json($message);

   }




}
