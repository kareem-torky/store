<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Size;

class SizeController extends Controller
{
    public function index()
    {
    	$data['sizes'] = Size::select('id', 'language_id','title','desc')
    	->where('language_id',language())
    	->get();
    	return view('admin.size.index')->with($data);
    }


    // return view of adding data 
    public function add()
    {
    	return view('admin.size.add');
    }



    // storing data in db 
    public function store(SizeRequest $request)
    {
    	$data = $request->validated();
			$data['language_id'] = language();
			$data['desc'] = nl2br($request->desc);

      Size::create($data);   
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.size.index'));
    }


        // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Size::findOrFail($id);
    	return view('admin.size.edit')->with($data);
    }



    // storing data in db 
    public function update(SizeRequest $request)
    {
			$data = $request->validated();
			$data['desc'] = nl2br($request->desc);
			
    	// updating data in db
    	Size::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.size.index'));
    }


    



    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
      Size::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Size::findOrFail($value)->delete();
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
    		$data = Size::find($value);
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
    	$data = Size::findOrFail($id);

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