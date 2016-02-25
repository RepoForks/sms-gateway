<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

}
