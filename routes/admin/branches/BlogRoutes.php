<?php 

//  categories routes
//  
Route::group(['prefix'=>'blog'],function()
{
	
	// show all data an data table 
	Route::get('/all','BlogController@index')->name('get.blog.index'); 
	// view form for adding new item 
	Route::get('/add','BlogController@add')->name('get.blog.add');  
	// store data of item 
	Route::post('/store','BlogController@store')->name('post.blog.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','BlogController@edit')->name('get.blog.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','BlogController@update')->name('put.blog.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','BlogController@delete')->name('get.blog.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','BlogController@deleteMulti')->name('post.blog.deleteMulti'); 

	// sort elements
	Route::post('/sort','BlogController@sort')->name('post.blog.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','BlogController@visibility')->name('get.blog.visibility')->where('id', '[0-9]+'); 




	// view data of seo
	Route::get('/seo/{id}','BlogController@seo')->name('get.blog.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','BlogController@updateSeo')->name('post.blog.updateSeo'); 





	//  comments 
	Route::get('/comments','CommentController@index')->name('get.blog.comments.index'); 
	
	

});