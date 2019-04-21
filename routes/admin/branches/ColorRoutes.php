<?php 

//  Color routes
//  
Route::group(['prefix'=>'color'],function()
{
	
	// show all data an data table 
	Route::get('/all','ColorController@index')->name('get.color.index'); 
		// view form for adding new item 
	Route::get('/add','ColorController@add')->name('get.color.add');  
	// store data of item 
	Route::post('/store','ColorController@store')->name('post.color.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','ColorController@edit')->name('get.color.edit'); 
	// update data of specific item 
	Route::put('/update','ColorController@update')->name('put.color.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','ColorController@delete')->name('get.color.delete'); 
	// delete multi  item
	Route::post('/delete/multi','ColorController@deleteMulti')->name('post.color.deleteMulti'); 

	// sort elements
	Route::post('/sort','ColorController@sort')->name('post.color.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','ColorController@visibility')->name('get.color.visibility'); 

});