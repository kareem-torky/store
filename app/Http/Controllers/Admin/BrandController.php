<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;

use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class BrandController extends Controller
{
    public function index()
    {

    	$data['brands'] = Brand::select('id','name','language_id','status','sort','img')
    	->where('language_id',language())
    	->orderBy('sort')
    	->get();
    	return view('admin.brand.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
    	return view('admin.brand.add');
    }





    // storing data in db 
    public function store(BrandRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();

        // upload image of this module
        if($request->hasFile('img'))
        {
            // UPLOADS_PATH.BRAND_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'img',UPLOADS_PATH.BRAND_PATH,$all=true);
            $data['img'] = $img;
        }
    	Brand::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.brand.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Brand::findOrFail($id);
    	return view('admin.brand.edit')->with($data);
    }



    // storing data in db 
    public function update(BrandRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('img'))
        {
            $old = Brand::findOrFail($request->id);
            // delete old image from server
            if($old->img)
            {
                Storage::disk('public_uploads')->delete(BRAND_PATH.$old->img);
                Storage::disk('public_uploads')->delete(BRAND_PATH.'small/'.$old->img);
                Storage::disk('public_uploads')->delete(BRAND_PATH.'medium/'.$old->img);
            }
            // UPLOADS_PATH.BRAND_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'img',UPLOADS_PATH.BRAND_PATH,$all=true);
            $data['img'] = $img;
        }
    	// updating data in db
    	Brand::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.brand.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        $old = Brand::findOrFail($id);
        Storage::disk('public_uploads')->delete(BRAND_PATH.$old->img);
        Storage::disk('public_uploads')->delete(BRAND_PATH.'small/'.$old->img);
        Storage::disk('public_uploads')->delete(BRAND_PATH.'medium/'.$old->img);

        Brand::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{

            $old = Brand::findOrFail($value);
            Storage::disk('public_uploads')->delete(BRAND_PATH.$old->img);
            Storage::disk('public_uploads')->delete(BRAND_PATH.'small/'.$old->img);
            Storage::disk('public_uploads')->delete(BRAND_PATH.'medium/'.$old->img);
    		Brand::findOrFail($value)->delete();
	    	
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
    		$data = Brand::find($value);
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
    	$data = Brand::findOrFail($id);

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
        $data['seo'] = Brand::where('language_id',language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.brand.seo')->with($data);

    }



     // storing data in db 
    public function updateSeo(Request $request)
    {
        $data = $request->except('id','_token');
        // updating data in db
        $seoData = Brand::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }











}
