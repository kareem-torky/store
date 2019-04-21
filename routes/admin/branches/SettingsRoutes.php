<?php 

//  Settings routes
//  
Route::group(['prefix'=>'settings'],function()
{
	
	// view form for editing base settings
	Route::get('/base','SettingsController@base')->name('get.settings.base');  
	// update settings
	Route::post('/base/update','SettingsController@updateBase')->name('post.settings.updateBase'); 
	// view data of seo
	Route::get('/seo','SettingsController@seo')->name('get.settings.seo'); 
	// update data of seo
	Route::post('/seo/update','SettingsController@updateSeo')->name('post.settings.updateSeo'); 

	Route::get('/site/content','SettingsController@siteContent')->name('get.settings.siteContent'); 



	Route::get('/site/content','SettingsController@siteContent')->name('get.settings.siteContent');  
    Route::post('/site/content/home','SettingsController@homeSiteContent')->name('post.settings.homeSiteContent');
	
	// view data of about us page
	Route::get('/aboutus','SettingsController@aboutus')->name('get.settings.aboutus'); 
	// update data of about us page
	Route::post('/aboutus/update','SettingsController@updateaboutus')->name('post.settings.updateaboutus'); 



});