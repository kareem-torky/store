<?php

namespace App\Http\Controllers\Admin\StaticPage;

use Illuminate\Http\Request;
use App\Http\Requests\StaticPageRequest;
use App\Http\Controllers\Controller;
use App\Models\StaticPage;

use Image;
use Storage;
use App\Helpers\Classes\UploadClass;

class StaticPageContoller extends Controller
{
    public function index()
    {

    	$data['staticPages'] = StaticPage::select('id','name','status','sort')
    	->where('language_id',language())
    	->orderBy('sort')
    	->paginate(30);
    	return view('admin.staticPage.index')->with($data);
    }



    // return view of adding data 
    public function add()
    {
    	return view('admin.staticPage.add');
    }





    // storing data in db 
    public function store(StaticPageRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();

        // upload image of this module
        if($request->hasFile('img'))
        {
            // UPLOADS_PATH.STATIC_PAGE_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadImage($request,'img',UPLOADS_PATH.STATIC_PAGE_PATH);
            $data['img'] = $img;
        }
        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	StaticPage::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.staticPage.index'));
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = StaticPage::findOrFail($id);
    	return view('admin.staticPage.edit')->with($data);
    }



    // storing data in db 
    public function update(StaticPageRequest $request)
    {
    	$data = $request->validated();

        // upload image of this module
        if($request->hasFile('img'))
        {
            $old = StaticPage::findOrFail($request->id);
            // delete old image from server
            if($old->img)
            {
                Storage::disk('public_uploads')->delete(STATIC_PAGE_PATH.$old->img);
                Storage::disk('public_uploads')->delete(STATIC_PAGE_PATH.'medium/'.$old->img);
                Storage::disk('public_uploads')->delete(STATIC_PAGE_PATH.'small/'.$old->img);
            }
            // UPLOADS_PATH.STATIC_PAGE_PATH 
            // -> static path ( you can change it from helpers/files/basehelper)
            $img = UploadClass::uploadImage($request,'img',UPLOADS_PATH.STATIC_PAGE_PATH);
            $data['img'] = $img;
        }
        //  slug
        if($request->slug != ''){$data['slug'] = slug($request->slug);}
        else{$data['slug'] = slug($request->name).uniqid();}
    	// updating data in db
    	StaticPage::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.staticPage.index'));
    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        $old = StaticPage::findOrFail($id);
        Storage::disk('public_uploads')->delete(STATIC_PAGE_PATH.$old->img);
        Storage::disk('public_uploads')->delete(STATIC_PAGE_PATH.'medium/'.$old->img);
        Storage::disk('public_uploads')->delete(STATIC_PAGE_PATH.'small/'.$old->img);
        StaticPage::findOrFail($id)->delete();

    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		StaticPage::findOrFail($value)->delete();
	    	
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
    		$data = StaticPage::find($value);
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
    	$data = StaticPage::findOrFail($id);

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
        $data['seo'] = StaticPage::where('language_id',language())->findOrFail($id);
        $data['seoData'] = json_decode($data['seo']['seo']);
        return view('admin.staticPage.seo')->with($data);
    }



     // updte seo data
    public function updateSeo(Request $request)
    {
        $data = $request->except('id','_token');
        // updating data in db
        $seoData = StaticPage::find($request->id);
        $seoData->seo = json_encode($data);
        $seoData->save();
        session()->flash('message',trans('site.updated_success'));
        return back();
    }












}
