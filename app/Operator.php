<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
	protected $fillable = ['name', 'description', 'country'];

    public function prefixes(){
	    return $this->belongsToMany('App\NumberPrefix', 'number_prefix_operator');
    }

	public function selectName(){

		$afterName = '[';

		foreach($this->prefixes as $prefix) {
			$afterName .= '0'.$prefix->prefix . ' ';
		}

		$afterName .= ']';
		return $this->name . ' ' . $afterName;
	}

	public function prefixesArray(){
		$_resp = [];
		foreach($this->prefixes as $prefix){
			array_push($_resp, $prefix->prefix);
		}
		return $_resp;
	}

}
