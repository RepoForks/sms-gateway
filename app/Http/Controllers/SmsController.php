<?php

namespace App\Http\Controllers;

use App\History;
use App\SmsTemplate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
{

	public function indexTemplates(){
		return view('sms.templates')
			->withTemplates(Auth::user()->smsTemplates);
	}


	public function indexHistory(){
		$sent = History::where('action', 'sms.send')
			->where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
		return view('sms.history')
			->withSent($sent);
	}

	public function createTemplate(Request $request){

		if(!\Auth::user()->validSmsTemplatesLimit()){
			return back()->withErrors(['You have reached SMS template limit.']);
		}

		$data = $request->only(['content', 'description']);

		$validator = Validator::make($data, [
			'content' => 'required',
			'description' => 'required'
		]);

		if($validator->fails()){
			return back()->withErrors($validator->errors());
		}

		$description = $data['description'];
		$content = $data['content'];

		SmsTemplate::create([
			'user_id' => Auth::user()->id,
			'sent_count' => 0,
			'content' => $content,
			'sms_id' => strtolower(str_random(16)),
			'description' => $description
		]);

		Session::flash('message', 'SMS template created.');
		return back();
	}

	public function editTemplatesPage($id){
		$prepared = SmsTemplate::findOrFail($id);
		return view('sms.edit_templates')
			->withSms($prepared);
	}

	public function updateTemplate(Request $request, $id){

		$data = $request->only(['content', 'description']);

		$validator = Validator::make($data, [
			'content' => 'required',
			'description' => 'required'
		]);

		if($validator->fails()){
			return back()->withErrors($validator->errors());
		}


		$sms = SmsTemplate::findOrFail($id);
		$sms->update($data);
		Session::flash('message', 'SMS template updated.');
		return back();
	}

	public function deleteTemplate($id){

		$sms = SmsTemplate::findOrFail($id);
		$sms->delete();

		Session::flash('message', 'SMS template removed.');

		return back();
	}

}
