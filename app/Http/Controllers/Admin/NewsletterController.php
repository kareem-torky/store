<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;


class NewsLetterController extends Controller
{
    public function index()
    {

    	$data['newsletters'] = Newsletter::all();
    	return view('admin.newsletter.index')->with($data);
    }




    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	Newsletter::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return redirect(route('admin.get.newsletter.index'));

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Newsletter::findOrFail($value)->delete();
	    	
    	}

    	session()->flash('message',trans('site.deleted_success'));
	    return redirect(route('admin.get.newsletter.index'));
    }








}
