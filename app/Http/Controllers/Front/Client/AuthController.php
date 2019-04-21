<?php

namespace App\Http\Controllers\Front\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client\Client;

class AuthController extends Controller
{
    

     public function login()
     {
     	 return view('front.client.auth.login');
     }


      // login authencation 
  	public function doLogin(Request $request)
    {

    	$request->validate([
    		'email'=>'required|email|max:30',
    		'password'=>'required|max:30',
    	]);
    	$remember = request()->has('remember') ? true: false;
    	if(\Auth::guard('client')->attempt(['email'=>request('email'),'password'=>request('password'),'status'=>'active']))
    	{
    		return redirect(route('front.get.home.index'));
    		// return redirect(route('admin.get.home.index'));
    	}
    	else
    	{
    		return back()->withErrors(trans('site.errors.dataNotCorrect'));
    	}
    }// end do login function 


















    public function register()
    {
     	return view('front.client.auth.register');
    }





    public function doRegister(Request $request)
    {
    	$request->validate([

    		'name'=>'required|string|max:100',
    		'email'=>'required|email|unique:clients,email|max:100',
    		'password'=>'required|string|max:50|min:6',
    		'confirm-password'=>'required|string|same:password|max:50',

    	]);


    	$data = new Client();
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->status = "active";
    	$data->password = bcrypt($request->password);
    	$data->save();

    	session()->flash('message',trans('frontSite.successRegister'));
    	return back();
    }


     // client logout 

    public function logout()
    {
        clientAuth()->logout();
        return redirect(route('front.get.home.index'));
    } // end logout function 




}
