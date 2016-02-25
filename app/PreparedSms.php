<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreparedSms extends Model
{

	use SoftDeletes;

    protected $table = 'prepared_sms';

	protected $fillable = ['user_id', 'sent_count', 'text', 'maximum_characters', 'sms_id', 'description'];

	public function getEditUrl(){
		return route('sms.prepared.edit', [$this->attributes['id']]);
	}

	public function getDeleteUrl(){
		return route('sms.prepared.delete', [$this->attributes['id']]);
	}

}
