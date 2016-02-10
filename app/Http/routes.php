<?php

Route::get('/', function () {
	return('welcome bro');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

	Route::group(['middleware' => 'auth'], function(){

		Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
		Route::get('keys', ['as' => 'keys.index', 'uses' => 'ApiKeysController@index']);
		Route::post('keys', ['as' => 'keys.create', 'uses' => 'ApiKeysController@generate']);
		Route::get('prepared', ['as' => 'sms.prepared', 'uses' => 'SmsController@indexPrepared']);
		Route::post('prepared', ['as' => 'sms.prepared.create', 'uses' => 'SmsController@createPrepared']);
		Route::get('automatic', ['as' => 'sms.automatic', 'uses' => 'SmsController@indexAutomaticSending']);
		Route::get('history', ['as' => 'sms.history', 'uses' => 'SmsController@indexHistory']);
		Route::get('profile', ['as' => 'profile.show', 'uses' => 'UserController@show']);
		Route::get('plan', ['as' => 'plan.index', 'uses' => 'PlanController@index']);
		Route::get('users', ['as' => 'user.index', 'uses' => 'UserController@index']);
		Route::get('stats', ['as' => 'dashboard.stats', 'uses' => 'DashboardController@showStats']);
		Route::get('gateways', ['as' => 'gateway.index', 'uses' => 'GatewaysController@index']);
	});

	Route::group(['prefix' => 'api'], function (){
		Route::get('key/enable/{id}', ['as' => 'key.enable', 'uses' => 'ApiKeysController@enableKey']);
		Route::get('key/disable/{id}', ['as' => 'key.disable', 'uses' => 'ApiKeysController@disableKey']);
		Route::get('key/remove/{id}', ['as' => 'key.remove', 'uses' => 'ApiKeysController@safeDelete']);
	});

});
