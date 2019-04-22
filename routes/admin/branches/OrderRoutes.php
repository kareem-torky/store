<?php 

//  Size routes
//  
Route::group(['prefix'=>'order', 'namespace'=>'Order'],function()
{
		
	Route::get('/show/{id}','OrderController@show')->name('get.order.show'); 
	Route::post('/content','OrderController@contentStatus')->name('get.order.contentStatus'); 
	Route::post('/to-cancelled','OrderController@toCancelled')->name('post.order.toCancelled');
	Route::get('/delete/{id}','OrderController@delete')->name('get.order.delete'); 
	Route::post('/delete/multi','OrderController@deleteMulti')->name('post.order.deleteMulti'); 
 

  Route::group(['prefix'=>'pending'],function(){

		Route::get('/all','PendingController@index')->name('get.order.pending.index');       
		Route::post('/to-shipping','PendingController@toShipping')->name('post.order.pending.toShipping'); 

	});
	
  Route::group(['prefix'=>'shipping'],function(){

		Route::get('/all','ShippingController@index')->name('get.order.shipping.index');
		Route::post('/to-accepted','ShippingController@toAccepted')->name('post.order.shipping.toAccepted'); 
		Route::post('/to-refused','ShippingController@toRefused')->name('post.order.shipping.toRefused'); 

	});
	
  Route::group(['prefix'=>'cancelled'],function(){

		Route::get('/all','CancelledController@index')->name('get.order.cancelled.index');

	});
	
  Route::group(['prefix'=>'accepted'],function(){

		Route::get('/all','AcceptedController@index')->name('get.order.accepted.index');
	});
	
  Route::group(['prefix'=>'refused'],function(){

		Route::get('/all','RefusedController@index')->name('get.order.refused.index');

  });

});