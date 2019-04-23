<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;

class OrderController extends Controller
{
    
    public function show($id)
    {
        $data['order'] = Order::where('id', $id)->first();
        $data['orderContents'] = OrderContent::select('id', 'product_id','quantity','status')
        ->where('order_id', $id)
    	->get();
    	return view('admin.order.show')->with($data);
    }

    public function contentStatus(Request $request)
    {
        if($request->ajax())
        {
            $content = OrderContent::where('id', $request->id)->first();

            if($content->status == 'accepted'){
                $content->status = 'refused';
                $message['success'] = trans('site.accepted_success');
            } else {
                $content->status = 'accepted';
                $message['success'] = trans('site.refused_success');
            }

            $status = $content->status;
            $content->save();

            return response()->json($status);
        }
    }

    public function toCancelled(Request $request)
    {
        if($request->ajax())
        {
            $order = Order::where('id', $request->id)->first();
            $order->status = 'cancelled';
            $order->save();
            $message['success'] = trans('site.cancelled_success');
            return response()->json($message);
        }
    }



    
    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Order::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();
    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Order::findOrFail($value)->delete();
    	}

    	session()->flash('message',trans('site.deleted_success'));
	    return back();
    }
}
