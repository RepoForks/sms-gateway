<?php

use Illuminate\Database\Seeder;

class AddVerificationApiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Api::create([
	        'version' => '1.0',
	        'name' => 'Verification API',
	        'api_name' => 'verification',
	        'navigation_icon' => 'fa-calendar-check-o'
        ]);
    }
}
