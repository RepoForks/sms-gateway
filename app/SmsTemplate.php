<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsTemplate extends Model
{

	use SoftDeletes;

	private $filled;

    protected $table = 'sms_templates';

	protected $fillable = ['user_id', 'sent_count', 'content', 'maximum_characters', 'sms_id', 'description'];

	public function getEditUrl(){
		return route('sms.template.edit', $this->id);
	}

	public function getDeleteUrl(){
		return route('sms.template.delete', $this->id);
	}

	public function fillData($data){
		$this->filled = $this->content;
		foreach($data as $key => $value) {
			$this->filled = str_replace("\\($key)", $value, $this->filled);
		}
	}

	public function getFilled(){
		return $this->filled;
	}

}
