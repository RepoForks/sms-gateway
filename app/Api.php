<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{

	public function users(){
		return $this->belongsToMany('App\User', 'api_user');
	}

	public function getEnableUrl(){
		return route($this->api_name . '.enable');
	}

	public function getDisableUrl(){
		return route($this->api_name . '.disable');
	}

	public function configuration(){
		return $this->hasOne('App\\'. ucfirst($this->api_name).'Config');
	}

}
