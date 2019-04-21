<?php

namespace App\Http\Controllers\Admin\StaticPage;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionStaticPageRequest;
use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use App\Models\QuestionStaticPage;



class QuestionPageContoller extends Controller
{
    



    // return view of adding data 
    public function add($id)
    {
        $data['page'] = StaticPage::where('type','faq')->findOrFail($id);
    	$data['questions'] = QuestionStaticPage::select('id','question','answer','page_id','status','sort')
        ->where('page_id',$id)
        ->orderBy('sort')
        ->get();
        return view('admin.staticPage.question.index')->with($data);
    }





    // storing data in db 
    public function store(QuestionStaticPageRequest $request)
    {
    	$data = $request->validated();
    	QuestionStaticPage::create($data); // inserting data 
    	session()->flash('message',trans('site.added_success'));
    	return back();
    }







    // return view of editing data 
    public function edit($id)
    {
    	$data['row'] = QuestionStaticPage::findOrFail($id);
        $data['page'] = StaticPage::where('type','faq')->findOrFail($data['row']['page_id']);
    	return view('admin.staticPage.question.edit')->with($data);
    }



    // storing data in db 
    public function update(QuestionStaticPageRequest $request)
    {
        $data = QuestionStaticPage::find($request->question_id);
        $data->answer    = $request->answer;
    	$data->question  = $request->question;
        // updating data in db
        $data->save();
    	session()->flash('message',trans('site.updated_success'));
    	return redirect(route('admin.get.questionPage.add',$request->page_id));

    }



















    // deleteing row from db  ( soft delete )
    public function delete($id)
    {
    	QuestionStaticPage::findOrFail($id)->delete();
    	session()->flash('message',trans('site.deleted_success'));
    	return back();

    }

    // delete mutli row from table 
    public function deleteMulti(Request $request)
    {
    	foreach ($request->deleteMulti as  $value) 
    	{
    		QuestionStaticPage::findOrFail($value)->delete();
	    	
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
    		$data = QuestionStaticPage::find($value);
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
    	$data = QuestionStaticPage::findOrFail($id);

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
