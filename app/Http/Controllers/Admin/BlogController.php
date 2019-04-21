<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;


use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class BlogController extends Controller
{



    public function index()
    {
    	$data['blogs'] = Blog::select('id','name','language_id','status','sort','category_id')
    	->where('language_id',language())
    	->orderBy('sort')
    	->paginate(30);
    	return view('admin.blog.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
        $data['categories'] = Category::select('id','name','language_id')
        ->where('language_id',adminAuth()->user()->language_id)
        ->orderBy('sort')
        ->get();
    	return view('admin.blog.add')->with($data);
    }





    // storing data in db 
    public function store(BlogRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();

        // upload image of this module
        if($request->hasFile('img'))
        {
            // UPLOADS_PATH.BLOG_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadImage($request,'img',UPLOADS_PATH.BLOG_PATH);
            $data['img'] = $img;
        }
        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	Blog::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.blog.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
        $data['categories'] = Category::select('id','name','language_id')
        ->where('language_id',adminAuth()->user()->language_id)
        ->orderBy('sort')
        ->get();
    	$data['row'] = Blog::findOrFail($id);
    	return view('admin.blog.edit')->with($data);
    }



    // storing data in db 
    public function update(BlogRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('img'))
        {
            $old = Blog::findOrFail($request->id);
            // delete old image from server
            if($old->img)
            {
                Storage::disk('public_uploads')->delete(BLOG_PATH.$old->img);
                Storage::disk('public_uploads')->delete(BLOG_PATH.'small/'.$old->img);
                Storage::disk('public_uploads')->delete(BLOG_PATH.'medium/'.$old->img);
            }
            // UPLOADS_PATH.BLOG_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadImage($request,'img',UPLOADS_PATH.BLOG_PATH);
            $data['img'] = $img;
        }

        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	// updating data in db
    	Blog::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.blog.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {

        $old =  Blog::findOrFail($id);
        Storage::disk('public_uploads')->delete(BLOG_PATH.$old->img);
        Storage::disk('public_uploads')->delete(BLOG_PATH.'small/'.$old->img);
        Storage::disk('public_uploads')->delete(BLOG_PATH.'medium/'.$old->img);
    	Blog::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
            $old =  Blog::findOrFail($value);
            Storage::disk('public_uploads')->delete(BLOG_PATH.$old->img);
            Storage::disk('public_uploads')->delete(BLOG_PATH.'small/'.$old->img);
            Storage::disk('public_uploads')->delete(BLOG_PATH.'medium/'.$old->img);

            Blog::findOrFail($value)->delete();
            
	    	
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
    		$data = Blog::find($value);
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
    	$data = Blog::findOrFail($id);

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
        $data['seo'] = Blog::where('language_id',language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.blog.seo')->with($data);

    }



     // storing data in db 
    public function updateSeo(Request $request)
    {
        $data = $request->except('id','_token');
        // updating data in db
        $seoData = Blog::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }











}
