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
		return view('user.profile')
			->with('user', \Auth::user());
	}

	public function index(){
		$users = User::all();
		return view('user.index')
			->withUsers($users);
	}

	public function profile($id){

		// TODO make ACL

		if(!\Auth::user()->isAdmin()) {
			abort(404);
		}

		return view('user.show')
			->withUser(User::findOrFail($id));
	}

	public function deleteUser($id){

		// TODO make ACL

		if(!\Auth::user()->isAdmin()) {
			abort(404);
		}


		$user = User::findOrFail($id);

		if($user->id == \Auth::user()->id) {
			return back()->withErrors(['Cannot delete your account.']);
		}

		$user->delete();

		Session::flash('message', 'User was successfully removed.');
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

	public function editUser(Request $request){

		$data = $request->only(['first_name', 'last_name']);

		$validator = Validator::make($data, [
			'first_name' => 'required|max:100',
			'last_name' => 'required|max:100'
		]);

		if($validator->fails()){
			return back()->withErrors($validator->errors());
		}

		\Auth::user()->update($data);

		Session::flash('message', 'Personal details updated.');
		return back();
	}

	public function editEmail(Request $request) {

		$data = $request->only(['email']);

		$validator = Validator::make($data, [
			'email' => 'required|unique:users|email'
		]);

		if($validator->fails()){
			return back()->withErrors($validator->errors());
		}

		\Auth::user()->update($data);

		Session::flash('message', 'Email updated.');
		return back();
	}

}
