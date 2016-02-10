<?php

namespace App\Http\Controllers;

use App\PreparedSms;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SmsController extends Controller
{

	public function indexPrepared(){
		return view('sms.prepared')
			->withPreparedsms(Auth::user()->preparedSms);
	}

	public function indexAutomaticSending(){
		return view('sms.automatic');
	}

	public function indexHistory(){
		return view('sms.history');
	}

	public function createPrepared(Request $request){
		Session::flash('message', 'Prepared SMS was successfully created.');

		$description = $request->get('description');
		$content = $request->get('content');

		PreparedSms::create([
			'user_id' => Auth::user()->id,
			'sent_count' => 0,
			'text' => $content,
			'sms_id' => strtolower(str_random(16)),
			'description' => $description
		]);

		return back();
	}

}
