<?php

namespace App\Http\Controllers\Front\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client\Client;

class ProfileController extends Controller
{
    

     public function index()
     {
     	 return view('front.client.profile');
     }



    public function editProfile(Request $request)
    {
    	$request->validate([

    		'name'=>'required|string|max:100',
    		'address'=>'nullable|string|max:300',
    		'mobile'=>'nullable|string|max:100',
    		'mobile2'=>'nullable|string|max:100',
    		'more_info'=>'nullable|string|max:500',

    	]);


    	$data = Client::find(clientAuth()->user()->id);
    	$data->name = $request->name;
    	$data->address = $request->address;
    	$data->mobile = $request->mobile;
    	$data->mobile2 = $request->mobile2;
    	$data->more_info =nl2br($request->more_info);
    	$data->save();
    	session()->flash('message',trans('frontSite.successEdit'));
    	return back();
    }




}
