<?php 

//  Size routes
//  
Route::group(['prefix'=>'size'],function()
{
	
	// show all data an data table 
	Route::get('/all','SizeController@index')->name('get.size.index'); 
		// view form for adding new item 
	Route::get('/add','SizeController@add')->name('get.size.add');  
	// store data of item 
	Route::post('/store','SizeController@store')->name('post.size.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','SizeController@edit')->name('get.size.edit'); 
	// update data of specific item 
	Route::put('/update','SizeController@update')->name('put.size.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','SizeController@delete')->name('get.size.delete'); 
	// delete multi  item
	Route::post('/delete/multi','SizeController@deleteMulti')->name('post.size.deleteMulti'); 

	// sort elements
	Route::post('/sort','SizeController@sort')->name('post.size.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','SizeController@visibility')->name('get.size.visibility'); 

});