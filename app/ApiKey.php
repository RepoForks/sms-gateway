<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;

class ApiKey extends Model
{

	use SoftDeletes;

	public function owner(){
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	protected $fillable = ['user_id', 'key', 'enabled', 'sent_count', 'received_count', 'error_count', 'description'];

	protected $dates = ['deleted_at'];

	protected $casts = [
		'enabled' => 'boolean'
	];

	public function getStatus(){
		return $this->isEnabled() ? 'enabled' : 'disabled';
	}

	public function getStatusBadge(){
		return $this->isEnabled() ?
			'<span class="badge badge-primary">enabled</span>' :
			'<span class="badge badge-danger">disabled</span>';
	}

	public function enable(){
		$this->attributes['enabled'] = 1;
		$this->save();
	}

	public function disable(){
		$this->attributes['enabled'] = 0;
		$this->save();
	}

	public function safeDelete(){
		$this->delete();
	}

	public function isEnabled(){
		return $this->attributes['enabled'] == 1;
	}

	public function validDayLimit(){
		return $this->owner->sent_limit_today > $this->owner->sentCountToday();
	}

	public function validMonthLimit(){
		return $this->owner->sent_limit_month > $this->owner->sentCountMonth();
	}


}
