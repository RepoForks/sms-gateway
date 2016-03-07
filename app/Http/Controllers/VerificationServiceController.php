<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Verification;
use App\VerificationConfig;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VerificationServiceController extends ApiController
{

	public function __construct()
	{
		$this->setApi('verification');
	}


	public function update(Request $request)
	{

		$data = $request->only(['allowed_characters', 'expiration', 'token_length', 'message_content']);

		$conf = VerificationConfig::where('user_id', \Auth::user()->id)->first();

		$conf->update($data);

		Session::flash('message', $this->api->name . ' configuration updated.');

		return back();
	}

	public function onEnabled()
	{
		if ($this->api->configuration == null) {
			VerificationConfig::create([
				'user_id'            => \Auth::user()->id,
				'allowed_characters' => 'abcdefghijklmnopqrstuvwxyz012346789',
				'message_content'    => 'Your verification code is \\(code).'
			]);
		}
	}

	public function generate(Request $request)
	{

		$data = $request->all();

		$validator = Validator::make($data, [
			'token'  => 'required',
			'number' => 'required'
		]);

		if ($validator->fails()) {
			return validatorError($validator->errors());
		}

		$token = $this->getToken($data['token']);

		if (!$token->owner->hasApiEnabled($this->api)) {
			return errorResponse('api_disabled', 403);
		}

		if ($token == null) {
			return errorResponse("token_invalid", 403);
		}

		if (!$token->enabled) {
			return errorResponse("token_disabled", 403);
		}

		if (!$token->validDayLimit()) {
			return errorResponse('day_limit_reached', 403);
		}

		if (!$token->validMonthLimit()) {
			return errorResponse('month_limit_reached', 403);
		}

		$verification = Verification::create([
			'phone_number' => $data['number'],
			'code'         => $this->incrementalHash($this->api->configuration->token_length),
			'expiration'   => Carbon::now()->addMinutes($this->api->configuration->expiration)
		]);

		$sms = $this->api->configuration->message_content;
		$sms = str_replace("\\(code)", $verification->code, $sms);

		$this->sendApiRequest($data['number'], $sms, $token->owner->id);

		return successResponse('sent');

	}

	public function valid(Request $request)
	{

		$data = $request->only(['number', 'token', 'code']);

		$validator = Validator::make($data, [
			'number' => 'required',
			'code'   => 'required'
		]);

		if ($validator->fails()) {
			return validatorError($validator->errors());
		}

		$verification = Verification::where('code', $data['code'])
			->where('phone_number', $data['number'])->first();

		if ($verification == null) {
			return successResponse('invalid');
		}

		if ($verification->isValid()) {
			return successResponse('valid');
		}

		return successResponse('invalid');

	}

	private function incrementalHash($len = 5)
	{
		$charset = $this->api->configuration->allowed_characters;
		$base    = strlen($charset);
		$result  = '';

		$now = explode(' ', microtime())[1];
		while ($now >= $base) {
			$i      = $now % $base;
			$result = $charset[$i] . $result;
			$now /= $base;
		}

		return substr($result, -$len);
	}

}
