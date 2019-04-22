<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Order;
use App\Models\Product\OrderContent;

class CancelledController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::select('id','name','code')
        ->where('status', 'cancelled')
    	->get();
    	return view('admin.order.cancelled.index')->with($data);
    }
}
