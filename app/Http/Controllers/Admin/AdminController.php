<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Admin;



class AdminController extends Controller
{
    public function index()
    {

    	$data['admins'] = Admin::where('id','!=',adminAuth()->user()->id)->get();
    	return view('admin.admin.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
        $data['languages'] = language::all();
    	return view('admin.admin.add')->with($data);
    }





    // storing data in db 
    public function store(AdminRequest $request)
    {
    	$data = $request->except('confirm_password');
        $data['password'] = bcrypt('password');
    	Admin::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.admin.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Admin::findOrFail($id);
        $data['languages'] = language::all();
    	return view('admin.admin.edit')->with($data);
    }



    // storing data in db 
    public function update(AdminRequest $request)
    {

        if($request->password != '')
        {
            $data = $request->except('confirm_password','_token','_method');
            $data['password'] = bcrypt('password');
        }
        else
        {
            $data = $request->except('confirm_password','_token','_method');
            $data['password'] = adminAuth()->user()->password;
        }
    	

    	// updating data in db
    	Admin::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.admin.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	Admin::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return redirect(route('admin.get.admin.index'));

    }










}
