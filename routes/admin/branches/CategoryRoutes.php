<?php 

//  categories routes
//  
Route::group(['prefix'=>'category'],function()
{
	
	// show all data an data table 
	Route::get('/all','CategoryController@index')->name('get.category.index'); 
	// view form for adding new item 
	Route::get('/add','CategoryController@add')->name('get.category.add');  
	// store data of item 
	Route::post('/store','CategoryController@store')->name('post.category.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','CategoryController@edit')->name('get.category.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','CategoryController@update')->name('put.category.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','CategoryController@delete')->name('get.category.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','CategoryController@deleteMulti')->name('post.category.deleteMulti'); 

	// sort elements
	Route::post('/sort','CategoryController@sort')->name('post.category.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','CategoryController@visibility')->name('get.category.visibility')->where('id', '[0-9]+'); 




	// view data of seo
	Route::get('/seo/{id}','CategoryController@seo')->name('get.category.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','CategoryController@updateSeo')->name('post.category.updateSeo'); 
	

});