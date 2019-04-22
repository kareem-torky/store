<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;

class PendingController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::select('id','name','code')
        ->where('status', 'pending')
    	->get();
    	return view('admin.order.pending.index')->with($data);
    }

    public function toShipping(Request $request)
    {
        if($request->ajax())
        {
            $order = Order::where('id', $request->id)->first();
            $order->status = 'shipping';
            $order->admin_id = auth()->guard('admin')->id();
            $order->save();
            $message['success'] = trans('site.shipped_success');
            return response()->json($message);
        }
    }

}
