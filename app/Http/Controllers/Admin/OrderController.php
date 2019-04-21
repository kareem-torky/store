<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;

class OrderController extends Controller
{
    public function pendingIndex()
    {
    	$data['orders'] = Order::select('id','name','code')
    	->get();
    	return view('admin.order.pending.index')->with($data);
    }
}
