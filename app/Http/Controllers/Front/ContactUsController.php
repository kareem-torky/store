<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Newsletter;
use App\Models\Message;


use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;


class ContactUsController extends Controller
{
    


    public function contact()
    {
    	return view('front.static.contact');
    }


    // send message   
    public function sendMessage(Request $request)
    {

        if($request->ajax())
        {
            $request->validate([

                'name' => 'required|string|max:100',
                'phone' => 'required|numeric|digits_between:6,15',
                'email' => 'required|email|max:100',
                'message' => 'required|string|max:2000',
            ]);

            $data = $request->except("_token");

            Message::create($data);
            $message['success'] = trans('frontSite.contactusMessage');
            return response()->json($message);
        }
    }





    //  gallery
    public function gallery()
    {
    	return view('front.static.gallery');
    }




    public function subscribe(Request $request)
    {

        $request->validate(['email'=> 'required|email|unique:newsletters,email']);
        $data = new Newsletter();
        $data->email = $request->email;
        $data->save();
        $message['success'] = trans('frontSite.subscribeMessage');
        return response()->json($message);

    }






}
