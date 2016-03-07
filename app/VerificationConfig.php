<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationConfig extends Model
{

	protected $primaryKey = 'api_id';

    public $fillable = ['user_id', 'expiration', 'allowed_characters', 'token_length' ,'message_content'];
}
