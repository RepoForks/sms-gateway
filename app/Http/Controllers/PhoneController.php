<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PhoneController extends Controller
{
    public function index(){
	    return view('phone.index')
		    ->withPhones(Auth::user()->phoneNumbers);
    }

	public function createPhoneNumber(Request $request){

		Session::flash('message', 'Phone number record created succesfully!');
		return back();

	}

}
