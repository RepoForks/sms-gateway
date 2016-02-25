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
		return view('sms.automatic')
			->withPreparedsms(Auth::user()->preparedSms);
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

	public function editPreparedPage($id){
		$prepared = PreparedSms::findOrFail($id);
		return view('sms.edit_prepared')
			->withSms($prepared);
	}

	public function updatePrepared(Request $request, $id){

		$data = $request->all();
		$sms = PreparedSms::findOrFail($id);
		$sms->description = $data['description'];
		$sms->text = $data['content'];
		$sms->save();

		Session::flash('message', 'SMS Template was successfully updated!');

		return back();
	}

	public function deletePrepared($id){

		$sms = PreparedSms::findOrFail($id);
		$sms->delete();

		Session::flash('message', 'The SMS Template was successfully removed.');

		return back();
	}

	public function createAutomaticJob(Request $request){

		// TODO: some validation, right?
		Session::flash('message', 'Job created successfully!');
		return back();
	}

}
