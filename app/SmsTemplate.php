<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsTemplate extends Model
{

	use SoftDeletes;

    protected $table = 'sms_templates';

	protected $fillable = ['user_id', 'sent_count', 'text', 'maximum_characters', 'sms_id', 'description'];

	public function getEditUrl(){
		return route('sms.template.edit', [$this->attributes['id']]);
	}

	public function getDeleteUrl(){
		return route('sms.template.delete', [$this->attributes['id']]);
	}

}
