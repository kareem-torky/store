<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;


use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class ServiceController extends Controller
{



    public function index()
    {
    	$data['services'] = Service::select('id','name','language_id','status','sort','category_id')
    	->where('language_id',language())
    	->orderBy('sort')
    	->paginate(30);
    	return view('admin.service.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
        $data['categories'] = Category::select('id','name','language_id')
        ->where('language_id',adminAuth()->user()->language_id)
        ->orderBy('sort')
        ->get();
    	return view('admin.service.add')->with($data);
    }





    // storing data in db 
    public function store(ServiceRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();

        // upload image of this module
        if($request->hasFile('img'))
        {
            // UPLOADS_PATH.CATEGORY_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadImage($request,'img',UPLOADS_PATH.SERVICE_PATH,$all=true);
            $data['img'] = $img;
        }
        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	Service::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.service.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
        $data['categories'] = Category::select('id','name','language_id')
        ->where('language_id',adminAuth()->user()->language_id)
        ->orderBy('sort')
        ->get();
    	$data['row'] = Service::findOrFail($id);
    	return view('admin.service.edit')->with($data);
    }



    // storing data in db 
    public function update(ServiceRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('img'))
        {
            $old = Service::findOrFail($request->id);
            // delete old image from server
            if($old->img)
            {
                Storage::disk('public_uploads')->delete(SERVICE_PATH.$old->img);
                Storage::disk('public_uploads')->delete(SERVICE_PATH.'small/'.$old->img);
                Storage::disk('public_uploads')->delete(SERVICE_PATH.'medium/'.$old->img);
            }
            // UPLOADS_PATH.CATEGORY_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadImage($request,'img',UPLOADS_PATH.SERVICE_PATH,$all=true);
            $data['img'] = $img;
        }
        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	// updating data in db
    	Service::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.service.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {

    	$old = Service::findOrFail($id);

        Storage::disk('public_uploads')->delete(SERVICE_PATH.$old->img);
        Storage::disk('public_uploads')->delete(SERVICE_PATH.'small/'.$old->img);
        Storage::disk('public_uploads')->delete(SERVICE_PATH.'medium/'.$old->img);


    	Service::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{

            $old = Service::findOrFail($value);
            Storage::disk('public_uploads')->delete(SERVICE_PATH.$old->img);
            Storage::disk('public_uploads')->delete(SERVICE_PATH.'small/'.$old->img);
            Storage::disk('public_uploads')->delete(SERVICE_PATH.'medium/'.$old->img);
    		Service::findOrFail($value)->delete();
	    	
    	}

    	session()->flash('message',trans('site.deleted_success'));
	    return back();
    }


     // delete mutli row from table 
    public function sort(Request $request)
    {
    	$i = 1;
    	foreach ($request->sort as  $value) 
    	{
    		$data = Service::find($value);
    		$data->sort = $i;
    		$data->save();
    		$i++;
    	}
    	session()->flash('message',trans('site.sorted_success'));
	    return back();
    }






    // visibility  for this item ( active or not active  -- change status of this item )
    public function visibility($id)
    {
    	$data = Service::findOrFail($id);

    	switch ($data->status) 
    	{
    		case 'yes':
    			$data->status = 'no';
    			$data->save();
    			session()->flash('message',trans('site.deactivate_message'));
    			break;

    		case 'no':
    			$data->status = 'yes';
    			session()->flash('message',trans('site.activate_message'));
    			$data->save();
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	return back();

    }















   // return view of seo data 
    public function seo($id)
    {
        $data['seo'] = Service::where('language_id',language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.service.seo')->with($data);

    }



     // storing data in db 
    public function updateSeo(Request $request)
    {
        $data = $request->except('id','_token');
        // updating data in db
        $seoData = Service::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }











}
