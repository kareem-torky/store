<?php 

//  categories routes
//  
Route::group(['prefix'=>'service'],function()
{
	
	// show all data an data table 
	Route::get('/all','ServiceController@index')->name('get.service.index'); 
	// view form for adding new item 
	Route::get('/add','ServiceController@add')->name('get.service.add');  
	// store data of item 
	Route::post('/store','ServiceController@store')->name('post.service.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','ServiceController@edit')->name('get.service.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','ServiceController@update')->name('put.service.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','ServiceController@delete')->name('get.service.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','ServiceController@deleteMulti')->name('post.service.deleteMulti'); 

	// sort elements
	Route::post('/sort','ServiceController@sort')->name('post.service.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','ServiceController@visibility')->name('get.service.visibility')->where('id', '[0-9]+'); 




	// view data of seo
	Route::get('/seo/{id}','ServiceController@seo')->name('get.service.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','ServiceController@updateSeo')->name('post.service.updateSeo'); 



	// more images  for Service
	Route::get('/add-images/{id}','Service\ImageController@addImages')->name('get.service.addImages')->where('id', '[0-9]+');
	Route::post('/add-images','Service\ImageController@moreImages')->name('post.service.moreImages'); 
	Route::get('/delete-image/{id}','Service\ImageController@deleteImage')->name('get.service.delete.image')->where('id', '[0-9]+');





	

});