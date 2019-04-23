<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;

class RefusedController extends Controller
{
    public function index()
    {
        $admin_id = auth()->guard('admin')->id();
        $data['orders'] = Order::select('id','name','code', 'refused_notes')
        ->where('status', 'refused')
        ->where('admin_id', $admin_id)
    	->get();
    	return view('admin.order.refused.index')->with($data);
    }
}
