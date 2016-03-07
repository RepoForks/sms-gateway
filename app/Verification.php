<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = ['phone_number', 'code', 'expiration'];

	protected $dates = ['expiration'];

	public function isValid(){
		$now = Carbon::now()->timestamp;
		$exp = $this->expiration->timestamp;
		return $exp > $now;
	}

}
