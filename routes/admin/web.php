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



/*
*
*   route name (1,2,3,4)
* *
* *
* 1 => name of front  (admin or front)
* 2 => type of method  ( get or post or put or ... )
* 3 => name of controller 
* 4 => name of method 
* 
*/


//  for language (  package laravel macamara )
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

	//  prefix tgat show at url is (adminPnel)
	Route::prefix('adminPanel')->name('admin.')->group(function()
	{
		// authunication ( login or admin )
		Route::get('/login','AuthAdminController@login')->name('get.authadmin.login');
		Route::post('/login','AuthAdminController@do_login')->name('post.authadmin.do_login');

		// logout
		Route::get('/logout','AuthAdminController@logout')->name('get.authadmin.logout');
		// 


		//  admin is auth  ( function adminAuth() => this function return object of admin if he is authunicated ) 
		Route::group(['middleware'=>'admin:admin'],function()
		{
			//  base route after login
			Route::get('/','HomeController@index')->name('get.home.index');

			// get all routs from branches folder 
			foreach (File::allFiles(base_path('routes/admin/branches/')) as $file) 
			{
				// admin. is a first part of any route name 
		        require($file->getPathname());
		    }
			



		});


	});// end our routs 


});





