<?php

namespace App\Http\Controllers;

use App\ApiKey;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ApiKeysController extends Controller
{

	public function index()
	{
		return view('apikeys.index')
			->withKeys(Auth::user()->keys);
	}

	public function generate(Request $request)
	{

		if(!\Auth::user()->validApiKeysLimit()){
			return back()->withErrors(['You have reached the API key limit.']);
		}

		Session::flash('message', 'API key successfully generated and enabled!');
		$description = $request->get('description');
		ApiKey::create([
			'user_id' => Auth::user()->id,
			'key' => strtolower(str_random(32)),
			'enabled' => 1,
			'sent_count' => 0,
			'received_count' => 0,
			'error_count' => 0,
			'description' => $description
		]);

		return back();
	}

	public function enableKey($id){
		Session::flash('message', 'API key enabled!');
		$key = ApiKey::findOrFail($id);
		$key->enable();
		return back();
	}

	public function disableKey($id){
		Session::flash('message', 'API key disabled!');
		$key = ApiKey::findOrFail($id);
		$key->disable();
		return back();
	}

	public function safeDelete($id){
		Session::flash('message', 'API key removed!');
		$key = ApiKey::findOrFail($id);
		$key->safeDelete();
		return back();
	}

}
