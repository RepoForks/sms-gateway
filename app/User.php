<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','email', 'password', 'role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function keys(){
		return $this->hasMany('App\ApiKey', 'user_id', 'id');
	}

	public function preparedSms(){
		return $this->hasMany('App\PreparedSms', 'user_id', 'id');
	}

	/**
	 * Return full name of user.
	 */
	public function fullName(){
		return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
	}

	public function getRoleName(){
		if($this->attributes['role'] == 0){
			return 'User';
		} else if($this->attributes['role'] >= 100) {
			return 'Boss';
		}
	}


}
