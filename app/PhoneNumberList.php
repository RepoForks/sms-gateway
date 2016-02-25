<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumberList extends Model
{
    public function phoneNumbers(){
	    return $this->belongsToMany('App\PhoneNumber')
		    ->withPivot('phone_number_pivot');
    }
}
