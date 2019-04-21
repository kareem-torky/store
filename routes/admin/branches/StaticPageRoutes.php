<?php 

//  Static Pages routes
//  
Route::group(['prefix'=>'staticPage','namespace'=>'StaticPage'],function()
{
	
	// show all data an data table 
	Route::get('/all','StaticPageContoller@index')->name('get.staticPage.index'); 
	// view form for adding new item 
	Route::get('/add','StaticPageContoller@add')->name('get.staticPage.add');  
	// store data of item 
	Route::post('/store','StaticPageContoller@store')->name('post.staticPage.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','StaticPageContoller@edit')->name('get.staticPage.edit'); 
	// update data of specific item 
	Route::put('/update','StaticPageContoller@update')->name('put.staticPage.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','StaticPageContoller@delete')->name('get.staticPage.delete'); 
	// delete multi  item
	Route::post('/delete/multi','StaticPageContoller@deleteMulti')->name('post.staticPage.deleteMulti'); 

	// sort elements
	Route::post('/sort','StaticPageContoller@sort')->name('post.staticPage.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','StaticPageContoller@visibility')->name('get.staticPage.visibility'); 


	// view data of seo
	Route::get('/seo/{id}','StaticPageContoller@seo')->name('get.staticPage.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','StaticPageContoller@updateSeo')->name('post.staticPage.updateSeo');


});


Route::group(['prefix'=>'questionPage','namespace'=>'StaticPage'],function()
{
	
	// view form for adding new item 
	Route::get('/add/{id}','QuestionPageContoller@add')->name('get.questionPage.add');  
	// store data of item 
	Route::post('/store','QuestionPageContoller@store')->name('post.questionPage.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','QuestionPageContoller@edit')->name('get.questionPage.edit'); 
	// update data of specific item 
	Route::put('/update','QuestionPageContoller@update')->name('put.questionPage.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','QuestionPageContoller@delete')->name('get.questionPage.delete'); 
	// delete multi  item
	Route::post('/delete/multi','QuestionPageContoller@deleteMulti')->name('post.questionPage.deleteMulti'); 

	// sort elements
	Route::post('/sort','QuestionPageContoller@sort')->name('post.questionPage.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','QuestionPageContoller@visibility')->name('get.questionPage.visibility'); 
	

});