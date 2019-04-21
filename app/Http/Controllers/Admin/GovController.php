<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\GovRequest;
use App\Http\Controllers\Controller;
use App\Models\Area\Gov;

class GovController extends Controller
{
    public function index()
    {
    	$data['govs'] = Gov::select('id', 'language_id','name','desc')
    	->where('language_id',language())
    	->get();
    	return view('admin.gov.index')->with($data);
    }


    // return view of adding data 
    public function add()
    {
    	return view('admin.gov.add');
    }



    // storing data in db 
    public function store(GovRequest $request)
    {
    	$data = $request->validated();
    	$data['language_id'] = language();
    	Gov::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return redirect(route('admin.get.gov.index'));
    }


        // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = Gov::findOrFail($id);
    	return view('admin.gov.edit')->with($data);
    }



    // storing data in db 
    public function update(GovRequest $request)
    {
    	$data = $request->validated();
    	// updating data in db
    	Gov::where('id', $request->id)->update($data);
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.gov.index'));
    }



    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
        Gov::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		Gov::findOrFail($value)->delete();
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
    		$data = Gov::find($value);
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
    	$data = Gov::findOrFail($id);

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
