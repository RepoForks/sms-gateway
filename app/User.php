<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
	use SoftDeletes;

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

	public function smsTemplates(){
		return $this->hasMany('App\SmsTemplate', 'user_id', 'id');
	}

	public function phoneNumbers(){
		return $this->hasMany('App\PhoneNumber', 'user_id', 'id');
	}

	public function phoneNumberLists(){
		return $this->hasMany('App\PhoneNumberLists', 'user_id', 'id');
	}

	public function apis(){
		return $this->belongsToMany('App\Api', 'api_user');
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

	public function hasApiEnabled($api){
		$check = $this->apis()->where('api_name', $api->api_name)->first();
		return $check != null;
	}

	public function getDeleteUrl(){
		return route('user.delete', $this->id);
	}

	public function getProfileUrl(){
		return route('user.show.profile', $this->id);
	}

	public function isAdmin(){
		return $this->role >= 100;
	}

	public function sentCount(){
		return count(History::where('action', 'sms.send')->where('user_id', \Auth::user()->id)->get());
	}

	public function sentCountToday(){
		return count(History::where('action', 'sms.send')
			->where('user_id', $this->id)
			->whereDate('created_at', '=', Carbon::today()->toDateString())->get());
	}

	public function sentCountMonth(){
		return count(History::where('action', 'sms.send')
			->where('user_id', $this->id)
			->whereMonth('created_at', '=', date('m'))
			->get());
	}

	public function sentPercentToday(){
		return ($this->sentCountToday() / $this->sent_limit_today) * 100;
	}

	public function sentPercentMonth(){
		return ($this->sentCountMonth() / $this->sent_limit_month) * 100;
	}

	public function getMonthCount($month) {
		return count(History::where('action', 'sms.send')
			->where('user_id', $this->id)
			->whereMonth('created_at', '=', $month)
			->get());
	}

	public function validApiKeysLimit(){
		return $this->token_limit > count($this->keys);
	}

	public function validSmsTemplatesLimit(){
		return $this->templates_limit > count($this->smsTemplates);
	}

}
