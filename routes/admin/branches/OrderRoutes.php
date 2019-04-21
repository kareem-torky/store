<?php 

//  Size routes
//  
Route::group(['prefix'=>'order'],function()
{
	
  // show all data an data table 
  
  Route::group(['prefix'=>'pending'],function(){

    Route::get('/all','OrderController@pendingIndex')->name('get.order.pending.index');
    Route::get('/add','OrderController@pendingAdd')->name('get.order.pending.add');

    // delete multi  item
	  Route::post('/delete/multi','OrderController@pendingDeleteMulti')->name('post.order.pending.deleteMulti'); 

  });
  
  
		// view form for adding new item 
	// Route::get('/add','SizeController@add')->name('get.size.add');  
	// // store data of item 
	// Route::post('/store','SizeController@store')->name('post.size.store'); 
	// // view data of specific item  
	// Route::get('/edit/{id}','SizeController@edit')->name('get.size.edit'); 
	// // update data of specific item 
	// Route::put('/update','SizeController@update')->name('put.size.update'); 
	// // delete data of specific item
	// Route::get('/delete/{id}','SizeController@delete')->name('get.size.delete'); 
	// // delete multi  item
	// Route::post('/delete/multi','SizeController@deleteMulti')->name('post.size.deleteMulti'); 

	// // sort elements
	// Route::post('/sort','SizeController@sort')->name('post.size.sort'); 
	// // make this item visibile or not  
	// Route::get('/visibility/{id}','SizeController@visibility')->name('get.size.visibility'); 

});