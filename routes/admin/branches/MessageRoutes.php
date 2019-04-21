<?php 

//  Newsletter routes
//  
Route::group(['prefix'=>'message'],function()
{
	
	// show all data an data table 
	Route::get('/all','MessageController@index')->name('get.message.index'); 

	Route::get('/delete/{id}','MessageController@delete')->name('get.message.delete'); 
	// delete multi  item
	Route::post('/delete/multi','MessageController@deleteMulti')->name('post.message.deleteMulti'); 

	

});