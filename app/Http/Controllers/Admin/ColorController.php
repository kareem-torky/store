<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Color;


class ColorController extends Controller
{
    public function index()
    {
    	$data['colors'] = Color::select('id', 'language_id','title','color')
    	->where('language_id',language())
    	->get();
    	return view('admin.color.index')->with($data);
    }


    // return view of adding data 
    public function add()
    {
			$data['row'] = Color::findOrFail(1);
    	return view('admin.color.add')->with($data);
    }



    // storing data in db 
    public function store(ColorRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();
    	Color::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.color.index'));
    }


        // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Color::findOrFail($id);
    	return view('admin.color.edit')->with($data);
    }



    // storing data in db 
    public function update(ColorRequest $request)
    {
    	$data = $request->validated();
    	// updating data in db
    	Color::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.color.index'));
    }


    



    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Color::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Color::findOrFail($value)->delete();
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
    		$data = Color::find($value);
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
    	$data = Color::findOrFail($id);

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
}
