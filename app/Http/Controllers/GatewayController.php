<?php

namespace App\Http\Controllers;

use App\ApiKey;
use App\Gateway;
use App\Operator;
use App\SmsTemplate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use WebSocket\Client;

class GatewayController extends Controller
{

	public function index(){
		$operators = Operator::all();
		$gateways = Gateway::all();
		return view('gateway.index')
			->with('operators', $operators)
			->with('gateways', $gateways);
	}

	public function createGateway(Request $request){

		$data = $request->only(['operator_id', 'description']);

		$validator = Validator::make($data, [
			'operator_id' => 'required',
			'description' => 'required|min:10|max:1000'
		]);

		if($validator->fails()){
			return back()->withErrors($validator->errors())->withInput($data);
		}

		Gateway::create([
			'operator_id' => $data['operator_id'],
			'description' => $data['description'],
			'access_key' => strtolower(str_random(64))
		]);

		Session::flash('message', 'Gateway successfully created!');
		return back();
	}

	public function removeGateway($id) {

		if(!\Auth::user()->isAdmin()) {
			return back()->withErrors(['You have no permissions to remove gateway.']);
		}

		$gateway = Gateway::findOrFail($id);
		$gateway->delete();

		session::flash('message', 'Gateway removed.');
		return back();
	}

	/** API methods **/

	public function authGateway(Request $request) {

		$data = $request->only(['key']);
		$validator = Validator::make($data, [
			'key' => 'required'
		]);

		if($validator->fails()){
			return validatorError($validator->errors());
		}

		$gateway = Gateway::where('access_key', $data['key'])->first();

		if($gateway == null){
			return errorResponse('gateway_not_found', 404);
		}

		return successResponse($gateway->authResponse());
	}

	public function sendSms(Request $request){

		$data = $request->only(['number', 'content', 'token']);

		$validator = Validator::make($data, [
			'number' => 'required',
			'content' => 'required',
			'token' => 'required'
		]);

		if($validator->fails()){
			return validatorError($validator->errors());
		}

		$token = $this->getToken($data['token']);

		if($token == null) {
			return errorResponse("token_invalid", 403);
		}

		if(!$token->enabled) {
			return errorResponse("token_disabled", 403);
		}

		if(!$token->validDayLimit()) {
			return errorResponse('day_limit_reached', 403);
		}

		if(!$token->validMonthLimit()) {
			return errorResponse('month_limit_reached', 403);
		}

		$this->sendApiRequest($data['number'], $data['content'], $token->owner->id);

		return successResponse('sent');
	}

	public function sendSmsTemplate(Request $request){
		$data = $request->all();

		$validator = Validator::make($data, [
			'token' => 'required',
			'template' => 'required',
			'number' => 'required'
		]);

		if($validator->fails()){
			return validatorError($validator->errors());
		}

		$token = $this->getToken($data['token']);

		if($token == null) {
			return errorResponse("token_invalid", 403);
		}

		if(!$token->enabled) {
			return errorResponse("token_disabled", 403);
		}

		if(!$token->validDayLimit()) {
			return errorResponse('day_limit_reached', 403);
		}

		if(!$token->validMonthLimit()) {
			return errorResponse('month_limit_reached', 403);
		}

		$template = SmsTemplate::where('sms_id', $data['template'])->first();

		if($template == null) {
			return errorResponse('template_not_found', 404);
		}

		$forFill = $data;
		unset($forFill['token']);
		unset($forFill['template']);

		$template->fillData($forFill);
		$this->sendApiRequest($data['number'], $template->getFilled(), $token->owner->id);
		return successResponse('sent');

	}


	private function sendApiRequest($number, $content, $id){
		$client = new Client(getSocketUrl());
		$client->send($this->buildApiRegisterRequest());
		$client->send($this->buildApiRequest($number, $content));
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

	public function getToken($token){
		return ApiKey::where('key', $token)->first();
	}

}
