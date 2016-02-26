<?php

// TODO make roles and protect routes

// homepage route
Route::get('/', function () {
	return view('page.index');
});

Route::group(['middleware' => 'web'], function () {

	// authentication routes
    Route::auth();

	Route::group(['middleware' => 'auth'], function(){

		// dashboard
		Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

		// API keys
		Route::get('keys', ['as' => 'keys.index', 'uses' => 'ApiKeysController@index']);
		Route::post('keys', ['as' => 'keys.create', 'uses' => 'ApiKeysController@generate']);

		// sms templates
		Route::get('templates', ['as' => 'sms.template', 'uses' => 'SmsController@indexTemplates']);
		Route::post('templates', ['as' => 'sms.template.create', 'uses' => 'SmsController@createTemplate']);
		Route::get('templates/edit/{id}', ['as' => 'sms.template.edit', 'uses' => 'SmsController@editTemplatesPage']);
		Route::post('templates/edit/{id}', ['as' => 'sms.template.update', 'uses' => 'SmsController@updateTemplate']);
		Route::get('templates/delete/{id}', ['as' => 'sms.template.delete', 'uses' => 'SmsController@deleteTemplate']);

		// sms history
		Route::get('history', ['as' => 'sms.history', 'uses' => 'SmsController@indexHistory']);

		// users and profiles
		Route::get('users', ['as' => 'user.index', 'uses' => 'UserController@index']);
		Route::get('users/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
		Route::get('users/remove/{id}', ['as' => 'user.delete', 'uses'=> 'UserController@deleteUser']);
		Route::post('users/password', ['as' => 'user.password.change', 'uses' => 'UserController@changePassword']);

		// service stats
		Route::get('stats', ['as' => 'dashboard.stats', 'uses' => 'DashboardController@showStats']);

		// virtual gateways
		Route::get('gateways', ['as' => 'gateway.index', 'uses' => 'GatewaysController@index']);

		// services
		Route::group(['prefix' => 'apis'], function(){

			// verification api
			Route::get('verification', ['as' =>'verification.index', 'uses' => 'VerificationServiceController@index']);

		});

	});

	// web api
	Route::group(['prefix' => 'web'], function (){
		Route::get('key/enable/{id}', ['as' => 'key.enable', 'uses' => 'ApiKeysController@enableKey']);
		Route::get('key/disable/{id}', ['as' => 'key.disable', 'uses' => 'ApiKeysController@disableKey']);
		Route::get('key/remove/{id}', ['as' => 'key.remove', 'uses' => 'ApiKeysController@safeDelete']);
	});

	// mobile api
	Route::group(['prefix' => 'api'], function (){

	});

});
