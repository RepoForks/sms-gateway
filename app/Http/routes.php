<?php

// TODO make roles and protect routes

// homepage route
Route::get('/', function () {
	return view('page.index');
});

Route::group(['middleware' => 'web'], function () {

	// authentication routes
	{
		// Authentication Routes...
		Route::get('login', ['as' => 'login.page', 'uses' => 'Auth\AuthController@showLoginForm']);
		Route::post('login', ['as' => 'login','uses' => 'Auth\AuthController@login']);
		Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

		// Registration Routes...
		Route::get('register', ['as' => 'register.page', 'uses' => 'Auth\AuthController@showRegistrationForm'] );
		Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@register']);

		// Password Reset Routes...
		Route::get('password/reset/{token?}', ['as' => 'reset.page', 'uses' => 'Auth\PasswordController@showResetForm']);
		Route::post('password/email', ['as' => 'reset.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
		Route::post('password/reset', ['as' => 'reset.reset', 'uses' => 'Auth\PasswordController@reset']);
	}


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
		Route::get('users/profile', ['as' => 'user.show', 'uses' => 'UserController@show']);
		Route::get('users/remove/{id}', ['as' => 'user.delete', 'uses'=> 'UserController@deleteUser']);
		Route::post('users/password', ['as' => 'user.password.change', 'uses' => 'UserController@changePassword']);
		Route::post('user/edit', ['as' => 'user.edit', 'uses' => 'UserController@editUser']);
		Route::post('user/edit/email', ['as' => 'user.edit.email', 'uses' => 'UserController@editEmail']);
		Route::get('user/show/{id}', ['as' => 'user.show.profile', 'uses' => 'UserController@profile']);

		// service stats
		Route::get('stats', ['as' => 'dashboard.stats', 'uses' => 'DashboardController@showStats']);

		// virtual gateways
		Route::get('gateways', ['as' => 'gateway.index', 'uses' => 'GatewayController@index']);
		Route::post('gateways/create', ['as' => 'gateway.create', 'uses' => 'GatewayController@createGateway']);
		Route::get('gateways/remove/{id}', ['as' => 'gateway.remove', 'uses' => 'GatewayController@removeGateway']);

		// services
		Route::group(['prefix' => 'apis'], function(){

			// verification api
			Route::get('verification', ['as' =>'verification.index', 'uses' => 'VerificationServiceController@index']);
			Route::get('verification/enable', ['as' => 'verification.enable', 'uses' => 'VerificationServiceController@enableApi']);
			Route::get('verification/disable', ['as' => 'verification.disable', 'uses' => 'VerificationServiceController@disableApi']);
			Route::post('verification/update', ['as' => 'verification.update', 'uses' => 'VerificationServiceController@update']);

		});

	});

	// web api
	Route::group(['prefix' => 'web'], function (){
		Route::get('key/enable/{id}', ['as' => 'key.enable', 'uses' => 'ApiKeysController@enableKey']);
		Route::get('key/disable/{id}', ['as' => 'key.disable', 'uses' => 'ApiKeysController@disableKey']);
		Route::get('key/remove/{id}', ['as' => 'key.remove', 'uses' => 'ApiKeysController@safeDelete']);
	});

});

// restful api
Route::group(['prefix' => 'api', 'middleware' => 'api'], function (){

	Route::post('auth/gateway', ['uses' => 'GatewayController@authGateway']);
	Route::get('auth/gateway', ['uses' => 'GatewayController@authGateway']);

	Route::post('sms/send', ['uses' => 'GatewayController@sendSms']);
	Route::get('sms/send', ['uses' => 'GatewayController@sendSms']);

	Route::post('sms/send/template', ['uses' => 'GatewayController@sendSmsTemplate']);
	Route::get('sms/send/template', ['uses' => 'GatewayController@sendSmsTemplate']);

	Route::post('verification/generate', ['uses' => 'VerificationServiceController@generate']);
	Route::get('verification/generate', ['uses' => 'VerificationServiceController@generate']);

	Route::post('verification/check', ['uses' => 'VerificationServiceController@valid']);
	Route::get('verification/check', ['uses' => 'VerificationServiceController@valid']);

});
