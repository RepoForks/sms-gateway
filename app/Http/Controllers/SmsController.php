<?php

namespace App\Http\Controllers;

use App\SmsTemplate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SmsController extends Controller
{

	public function indexTemplates(){
		return view('sms.templates')
			->withTemplates(Auth::user()->smsTemplates);
	}


	public function indexHistory(){
		return view('sms.history');
	}

	public function createTemplate(Request $request){
		Session::flash('message', 'SMS template created.');

		$description = $request->get('description');
		$content = $request->get('content');

		SmsTemplate::create([
			'user_id' => Auth::user()->id,
			'sent_count' => 0,
			'text' => $content,
			'sms_id' => strtolower(str_random(16)),
			'description' => $description
		]);

		return back();
	}

	public function editTemplatesPage($id){
		$prepared = SmsTemplate::findOrFail($id);
		return view('sms.edit_templates')
			->withSms($prepared);
	}

	public function updateTemplate(Request $request, $id){

		$data = $request->all();
		$sms = SmsTemplate::findOrFail($id);
		$sms->description = $data['description'];
		$sms->text = $data['content'];
		$sms->save();

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
