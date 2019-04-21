<?php 

//  Governate routes
//  
Route::group(['prefix'=>'gov'],function()
{
	
	// show all data an data table 
	Route::get('/all','GovController@index')->name('get.gov.index'); 
		// view form for adding new item 
	Route::get('/add','GovController@add')->name('get.gov.add');  
	// store data of item 
	Route::post('/store','GovController@store')->name('post.gov.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','GovController@edit')->name('get.gov.edit'); 
	// update data of specific item 
	Route::put('/update','GovController@update')->name('put.gov.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','GovController@delete')->name('get.gov.delete'); 
	// delete multi  item
	Route::post('/delete/multi','GovController@deleteMulti')->name('post.gov.deleteMulti'); 

	// sort elements
	Route::post('/sort','GovController@sort')->name('post.gov.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','GovController@visibility')->name('get.gov.visibility'); 

});