<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

	public function show(){
		return view('user.profile');
	}

	public function index(){
		$users = User::all();
		return view('user.index')
			->withUsers($users);
	}

	public function deleteUser($id){
		Session::flash('message', 'User was sucessfully removed.');
		return back();
	}

	public function changePassword(Request $request){

		$validator = Validator::make($request->all(), [
			'password' => 'required|min:6|confirmed'
		]);

		if($validator->fails()){
			return back()->withErrors($validator->errors());
		}

		$user = Auth::user();
		$user->password = bcrypt($request->get('password'));
		$user->save();
		Session::flash('message', 'Password changed.');
		return back();
	}

}
