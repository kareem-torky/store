<?php 

//  Newsletter routes
//  
Route::group(['prefix'=>'newsletter'],function()
{
	
	// show all data an data table 
	Route::get('/all','NewsLetterController@index')->name('get.newsletter.index'); 

	Route::get('/delete/{id}','NewsLetterController@delete')->name('get.newsletter.delete'); 
	// delete multi  item
	Route::post('/delete/multi','NewsLetterController@deleteMulti')->name('post.newsletter.deleteMulti'); 

	

});