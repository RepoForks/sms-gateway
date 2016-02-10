<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreparedSms extends Model
{
    protected $table = 'prepared_sms';

	protected $fillable = ['user_id', 'sent_count', 'text', 'maximum_characters', 'sms_id', 'description'];

}
