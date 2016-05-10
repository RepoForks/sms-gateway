<?php

namespace App\Http\Controllers;

use App\Api;

use App\ApiKey;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use WebSocket\Client;

abstract class ApiController extends Controller
{

	// specify the api name
	private $name;
	public $api;

	public function setApi($name){
		$this->name = $name;
		$this->api = Api::where('api_name', $name)->first();
	}

	public function index(){
		return view('apis.'. $this->name .'.index')
			->withApi($this->api);
	}


	public function enableApi(){
		// also create configuration when is has not been created yet
		$this->onEnabled();
		\Auth::user()->apis()->attach($this->api->id);
		Session::flash('message', $this->api->name . ' enabled.');
		return back();
	}

	public function disableApi(){
		\Auth::user()->apis()->detach($this->api->id);
		Session::flash('message', $this->api->name . ' disabled.');
		return back();
	}

	public abstract function onEnabled();

	public function getToken($token){
		return ApiKey::where('key', $token)->first();
	}

	// TODO Boilerplate code
	public function sendApiRequest($number, $content, $id){
		$client = new Client(getSocketUrl());
		$client->send($this->buildApiRegisterRequest());
		$result = $client->receive();
		hist('api.response', $result, $id);
		$client->send($this->buildApiRequest($number, $content));
		$result = $client->receive();
		hist('api.response', $result, $id);
		hist('sms.send', 'Sent SMS to ' . $number . ': ' . $content, $id);
	}

	public function buildApiRegisterRequest(){
		return json_encode([
			'header' => [
				'request_id' => strtolower(str_random(32)),
				'type' => 'api_register'
			],
			'content' => [
				'access_key' => env('ACCESS_KEY', "!!!SET_ACCESS_KEY!!!")
			]
		]);
	}

	public function buildApiRequest($number, $content){
		return json_encode([
			'header' => [
				'request_id' => strtolower(str_random(32)),
				'type' => 'api_request'
			],
			'content' => [
				'number' => $number,
				'content' => $content
			]
		]);
	}

}
