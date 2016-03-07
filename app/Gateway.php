<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    protected $fillable = ['operator_id', 'description', 'access_key'];

	public function operator(){
		return $this->hasOne('App\Operator', 'id', 'operator_id');
	}

	public function getDeleteUrl(){
		return route('gateway.remove', $this->id);
	}

	public function getOperatorName(){
		if($this->operator == null) {
			return 'All';
		}

		return $this->operator->name;
	}

	public function authResponse(){
		return [
			'operators' => $this->operator == null ? null : $this->operator->prefixesArray()
		];
	}

}
