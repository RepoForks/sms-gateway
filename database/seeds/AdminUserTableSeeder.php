<?php

use App\User;
use Illuminate\Database\Seeder;


class AdminUserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
	        'first_name' => 'Admin',
	        'last_name' => 'Admin',
	        'email' => 'admin@smsgw.io',
	        'password' => bcrypt('admin'),
	        'role' => '100'
        ]);
    }
}
