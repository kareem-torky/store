<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;

class ShippingController extends Controller
{
    public function index()
    {
        $admin_id = auth()->guard('admin')->id();
        $data['orders'] = Order::select('id','name','code')
        ->where('status', 'shipping')
        ->where('admin_id', $admin_id)
    	->get();
    	return view('admin.order.shipping.index')->with($data);
    }
    

    public function toAccepted(Request $request)
    {
        if($request->ajax())
        {
            $order = Order::where('id', $request->id)->first();
            $order->status = 'accepted';
            $order->save();
            $message['success'] = trans('site.accepted_success');
            return response()->json($message);
        }
    }


    public function toRefused(Request $request)
    {
        if($request->ajax())
        {
            $order = Order::where('id', $request->id)->first();
            $order->status = 'refused';
            $order->save();
            $message['success'] = trans('site.refused_success');
            return response()->json($message);
        }
    }


}
