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
		Route::get('prepared/edit/{id}', ['as' => 'sms.prepared.edit', 'uses' => 'SmsController@editPreparedPage']);
		Route::post('prepared/edit/{id}', ['as' => 'sms.prepared.update', 'uses' => 'SmsController@updatePrepared']);
		Route::get('prepared/delete/{id}', ['as' => 'sms.prepared.delete', 'uses' => 'SmsController@deletePrepared']);
		Route::get('automatic', ['as' => 'sms.automatic', 'uses' => 'SmsController@indexAutomaticSending']);
		Route::post('automatic', ['as' => 'sms.automatic.create', 'uses' => 'SmsController@createAutomaticJob']);
		Route::get('history', ['as' => 'sms.history', 'uses' => 'SmsController@indexHistory']);
		Route::get('plan', ['as' => 'plan.index', 'uses' => 'PlanController@index']);
		Route::get('users', ['as' => 'user.index', 'uses' => 'UserController@index']);
		Route::get('users/{id}', ['as' => 'user.show', 'uses' => 'UserController@show']);
		Route::get('users/remove/{id}', ['as' => 'user.delete', 'uses'=> 'UserController@deleteUser']);
		Route::get('stats', ['as' => 'dashboard.stats', 'uses' => 'DashboardController@showStats']);
		Route::get('gateways', ['as' => 'gateway.index', 'uses' => 'GatewaysController@index']);
		Route::get('phone', ['as' => 'phone.index', 'uses' => 'PhoneController@index']);
		Route::post('phone', ['as' => 'phone.create', 'uses' => 'PhoneController@createPhoneNumber']);
		Route::get('list', ['as' => 'phone.list.index', 'uses' => 'PhoneNumberListController@index']);

		Route::group(['prefix' => 'apis'], function(){

			Route::get('verification', ['as' =>'verification.index', 'uses' => 'VerificationServiceController@index']);

		});

	});

	Route::group(['prefix' => 'web'], function (){
		Route::get('key/enable/{id}', ['as' => 'key.enable', 'uses' => 'ApiKeysController@enableKey']);
		Route::get('key/disable/{id}', ['as' => 'key.disable', 'uses' => 'ApiKeysController@disableKey']);
		Route::get('key/remove/{id}', ['as' => 'key.remove', 'uses' => 'ApiKeysController@safeDelete']);
	});

});
