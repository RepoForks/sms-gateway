<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    public function phoneList(){
	    return $this->belongsToMany('App\PhoneNumber')
		    ->withPivot('phone_number_pivot');
    }
}
