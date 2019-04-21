<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;


class MessageController extends Controller
{
    public function index()
    {

    	$data['messages'] = Message::all();
    	return view('admin.message.index')->with($data);
    }




    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	Message::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return redirect(route('admin.get.message.index'));

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Message::findOrFail($value)->delete();
	    	
    	}

    	session()->flash('message',trans('site.deleted_success'));
	    return redirect(route('admin.get.message.index'));
    }








}
