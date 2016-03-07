<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumberPrefix extends Model
{

	protected $fillable = ['prefix', 'description'];

    public function operator(){
	    return $this->belongsToMany('App\Operator', 'number_prefix_operator');
    }
}
