<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;

class AcceptedController extends Controller
{
    public function index()
    {
        $admin_id = auth()->guard('admin')->id();
        $data['orders'] = Order::select('id','name','code')
        ->where('status', 'accepted')
        ->where('admin_id', $admin_id)
    	->get();
    	return view('admin.order.accepted.index')->with($data);
    }
}
