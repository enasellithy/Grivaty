<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware'=>['web']],function(){
	Route::get('/','FrontController@index');
	Route::get('contact','ContactController@form');
	Route::post('contact/post','ContactController@formpost');
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
	Route::group(['middleware'=>'cpanel'],function(){
		Route::resource('cpanel','AdminController');
		Route::get('mailadmin','AdminController@mail');
		Route::get('mail/{mail}/show','AdminController@show');
		Route::get('mail/{mail}/replay','AdminController@replay');
		Route::get('mail/{mail}/delete','AdminController@destroy');
		Route::resource('slide','SlideController');
		Route::get('slide/{slide}/edit','SlideController@edit');
		Route::post('slide/{slide}/update','SlideController@update');
		Route::get('slide/{slide}/delete','SlideController@destroy');
		Route::resource('service','ServicesController');
		Route::get('service/{service}/edit','ServicesController@edit');
		Route::post('service/{service}/update','ServicesController@update');
		Route::get('service/{service}/delete','ServicesController@destroy');
		Route::get('service/{service}/active','ServicesController@active');
		Route::get('service/{service}/noactive','ServicesController@noactive');
		Route::resource('portfolio','PortfolioController');
		Route::get('portfolio/{portfolio}/edit','PortfolioController@edit');
		Route::post('portfolio/{portfolio}/update','PortfolioController@update');
		Route::get('portfolio/{portfolio}/delete','PortfolioController@destroy');
		Route::get('portfolio/{portfolio}/active','PortfolioController@active');
		Route::get('portfolio/{portfolio}/noactive','PortfolioController@noactive');
		Route::resource('about','AboutController');
		Route::get('about/{about}/edit','AboutController@edit');
		Route::post('about/{about}/update','AboutController@update');
		Route::get('about/{about}/delete','AboutController@destroy');
		Route::get('about/{about}/active','AboutController@active');
		Route::get('about/{about}/noactive','AboutController@noactive');
		Route::resource('team','TeamController');
		Route::get('team/{team}/edit','TeamController@edit');
		Route::post('team/{team}/update','TeamController@update');
		Route::get('team/{team}/delete','TeamController@destroy');
		Route::get('team/{team}/active','TeamController@active');
		Route::get('team/{team}/noactive','TeamController@noactive');
		Route::resource('brand','BrandController');
		Route::get('brand/{brand}/delete','BrandController@destroy');
		Route::get('brand/{brand}/active','BrandController@active');
		Route::get('brand/{brand}/noactive','BrandController@noactive');
		/* Images */
		Route::get('/images/portfolio/{$pimage}',function($name){
			return public_path('images/'.$name); 
		});
		Route::get('/images/service/{$simage}',function($name){
			return public_path('images/'.$name); 
		});
		Route::get('/images/slide/{$imageslide}',function($name){
			return public_path('images/'.$name); 
		});
		Route::get('/images/about/{$about_image}',function($name){
			return public_path('images/'.$name); 
		});
		Route::get('/images/team/{$teamimage}',function($name){
			return public_path('images/'.$name); 
		});
		Route::get('/images/brand/{$brandimage}',function($name){
			return public_path('images/'.$name); 
		});
		Route::get('/images/brand/{$toggle_image}',function($name){
			return public_path('images/'.$name); 
		});
	});
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
