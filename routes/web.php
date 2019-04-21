<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  prefix tgat show at url is (adminPnel)
//  prefix tgat show at url is (adminPnel)


//  for language (  package laravel macamara )
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	Route::namespace('Front')->name('front.')->group(function()
	{

		Route::get('/','HomeController@index')->name('get.home.index')->middleware('getRoute');
		Route::get('/about','HomeController@about')->name('get.home.about')->middleware('getRoute');

		// contact us page
		Route::get('/contact-us','ContactUsController@contact')->name('get.contactus.contact')->middleware('getRoute');
		// send message from contact us page 
		Route::post('/send-message','ContactUsController@sendMessage')->name('post.contactus.sendMessage')->middleware('postRoute');
		// gallery page
		// Route::get('/gallery','ContactUsController@gallery')->name('get.contactus.gallery')->middleware('getRoute');

		// portfolio page
		// Route::get('/portfolio','PortfolioController@portfolio')->name('get.portfolio.index')->middleware('getRoute');


		// services 
		Route::get('/services','ServiceController@all')->name('get.service.all')->middleware('getRoute');
		// show services according to category
		Route::get('/service/{slugCat}','ServiceController@category')->name('get.service.category')->middleware('getRoute');
		// show one service
		Route::get('/services/{slugService}','ServiceController@show')->name('get.service.show')->middleware('getRoute');
		// order this service
		// Route::post('/order','ServiceController@order')->name('post.service.order');




		// products 
		// Route::get('/products','ProductController@all')->name('get.product.all')->middleware('getRoute');
		// show products according to category
		Route::get('/product/{slugCat}','ProductController@category')->name('get.product.category')->middleware('getRoute');
		// show products according to sub category
		Route::get('/product/{slugCat}/{slugSubCat}','ProductController@subCategory')->name('get.product.subCategory')->middleware('getRoute');
		// show one product
		Route::get('/product/{slugCat}/{slugSubCat}/{slugProduct}','ProductController@show')->name('get.product.show')->middleware('getRoute');
		Route::post('/filter','ProductController@filter')->name('post.product.filter')->middleware('postRoute');

		// add this product to cart
		Route::post('/order','OrderController@order')->name('post.product.order')->middleware('postRoute');



		Route::get('/cart/show','CartController@show')->name('get.cart.show')->middleware('getRoute');
		Route::post('/cart/add','CartController@add')->name('post.cart.add')->middleware('postRoute');
		Route::post('/cart/update','CartController@update')->name('post.cart.update')->middleware('postRoute');
		Route::post('/cart/remove','CartController@remove')->name('post.cart.remove')->middleware('postRoute');
		Route::get('/cart/clear','CartController@clear')->name('get.cart.clear')->middleware('getRoute');
		Route::get('/cart/delete/{id}','CartController@delete')->name('get.cart.delete')->middleware('getRoute');






		// orders 
		Route::get('/order/checkout','OrderController@checkout')->name('get.order.checkout')->middleware('getRoute');
		Route::post('/order/sendOrder','OrderController@sendOrder')->name('post.order.sendOrder')->middleware('postRoute');







		// Blog 
		Route::get('/blog','BlogController@index')->name('get.blog.index')->middleware('getRoute');
		Route::get('/blog/{slugBlog}','BlogController@show')->name('get.blog.show')->middleware('getRoute');

		// subscribe
		Route::post('/subscribe','ContactUsController@subscribe')->name('post.contactus.subscribe')->middleware('postRoute');





		// customer area 

		Route::namespace('Client')->name('client.')->prefix('customer')->group(function()
		{
			if(!clientAuth()->user())
			{
				Route::get('/login','AuthController@login')->name('get.auth.login')->middleware('getRoute');
				Route::post('/login','AuthController@doLogin')->name('post.auth.doLogin')->middleware('postRoute');
				Route::get('/register','AuthController@register')->name('get.auth.register')->middleware('getRoute');
				Route::post('/register','AuthController@doRegister')->name('post.auth.doRegister')->middleware('postRoute');
			}
			


			
			//  admin is auth  ( function clientAuth() => this function return object of client if he is authunicated ) 
			Route::group(['middleware'=>'client:client'],function()
			{
				Route::get('/logout','AuthController@logout')->name('get.auth.logout')->middleware('getRoute');

				Route::get('/profile','ProfileController@index')->name('get.profile.index')->middleware('getRoute');
				Route::post('/profile','ProfileController@editProfile')->name('post.auth.editProfile')->middleware('postRoute');


			});

			


		});
		

	});


});
