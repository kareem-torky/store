<?php 

//  sub categories routes
//  
Route::group(['prefix'=>'subCategory'],function()
{
	
	// show all data an data table 
	Route::get('/all','SubCategoryController@index')->name('get.subCategory.index'); 

	// show all data according parent category
	Route::get('/slice/{id}','SubCategoryController@showSlice')->name('get.subCategory.showSlice'); 

	// view form for adding new item 
	Route::get('/add','SubCategoryController@add')->name('get.subCategory.add');  
	// store data of item 
	Route::post('/store','SubCategoryController@store')->name('post.subCategory.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','SubCategoryController@edit')->name('get.subCategory.edit'); 
	// update data of specific item 
	Route::put('/update','SubCategoryController@update')->name('put.subCategory.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','SubCategoryController@delete')->name('get.subCategory.delete'); 
	// delete multi  item
	Route::post('/delete/multi','SubCategoryController@deleteMulti')->name('post.subCategory.deleteMulti'); 



	// sort elements
	Route::post('/sort','SubCategoryController@sort')->name('post.subCategory.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','SubCategoryController@visibility')->name('get.subCategory.visibility'); 



	// view data of seo
	Route::get('/seo/{id}','SubCategoryController@seo')->name('get.subCategory.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','SubCategoryController@updateSeo')->name('post.subCategory.updateSeo');






	
	

});