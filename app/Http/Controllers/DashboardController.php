<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{


	public function index(){

		$monthStats = [];

		for($i = 1; $i <= 7; $i++) {
			array_push($monthStats, \Auth::user()->getMonthCount($i));
		}

		return view('dashboard.index')
			->withStats(json_encode($monthStats));
	}

	public function showStats(){
		return view('dashboard.stats');
	}

}
