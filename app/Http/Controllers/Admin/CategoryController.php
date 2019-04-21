<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;

use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class CategoryController extends Controller
{
    public function index()
    {

    	$data['categories'] = Category::select('id','name','language_id','status','sort')
    	->where('language_id',language())
    	->orderBy('sort')
    	->get();
    	return view('admin.category.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
    	return view('admin.category.add');
    }





    // storing data in db 
    public function store(CategoryRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();

        // upload image of this module
        if($request->hasFile('img'))
        {
            // UPLOADS_PATH.CATEGORY_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'img',UPLOADS_PATH.CATEGORY_PATH,$all=true);
            $data['img'] = $img;
        }
        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	Category::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.category.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Category::findOrFail($id);
    	return view('admin.category.edit')->with($data);
    }



    // storing data in db 
    public function update(CategoryRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('img'))
        {
            $old = Category::findOrFail($request->id);
            // delete old image from server
            if($old->img)
            {
                Storage::disk('public_uploads')->delete(CATEGORY_PATH.$old->img);
                Storage::disk('public_uploads')->delete(CATEGORY_PATH.'small/'.$old->img);
                Storage::disk('public_uploads')->delete(CATEGORY_PATH.'medium/'.$old->img);
            }
            // UPLOADS_PATH.CATEGORY_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadFile($request,'img',UPLOADS_PATH.CATEGORY_PATH,$all=true);
            $data['img'] = $img;
        }

        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	// updating data in db
    	Category::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.category.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        $old = Category::findOrFail($id);
        Storage::disk('public_uploads')->delete(CATEGORY_PATH.$old->img);
        Storage::disk('public_uploads')->delete(CATEGORY_PATH.'small/'.$old->img);
        Storage::disk('public_uploads')->delete(CATEGORY_PATH.'medium/'.$old->img);

        Category::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
            $old = Category::findOrFail($value);
            Storage::disk('public_uploads')->delete(CATEGORY_PATH.$old->img);
            Storage::disk('public_uploads')->delete(CATEGORY_PATH.'small/'.$old->img);
            Storage::disk('public_uploads')->delete(CATEGORY_PATH.'medium/'.$old->img);

            // delete this row 
    		Category::findOrFail($value)->delete();
	    	
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
    		$data = Category::find($value);
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
    	$data = Category::findOrFail($id);

    	switch ($data->status) 
    	{
    		case 'yes':
    			$data->status = 'no';
                $data->save();
                
                // updating data in service according to category
    	        Service::where('category_id', $id)->update('status','no');
    			session()->flash('message',trans('site.deactivate_message'));
    			break;

    		case 'no':
    			$data->status = 'yes';
    			session()->flash('message',trans('site.activate_message'));
                $data->save();
                
                // updating data in service according to category
    	        Service::where('category_id', $id)->update('status','yes');
                session()->flash('message',trans('site.deactivate_message'));
                
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
        $data['seo'] = Category::where('language_id',language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.category.seo')->with($data);

    }



     // storing data in db 
    public function updateSeo(Request $request)
    {
        $data = $request->except('id','_token');
        // updating data in db
        $seoData = Category::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }











}
