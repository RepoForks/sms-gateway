<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class OperatorsTableSeeder extends Seeder
{
    public function run()
    {
        $telekom = \App\Operator::create([
	        'name' => 'Slovak Telekom',
	        'description' => 'Slovak Telekom operator',
	        'country' => 'Slovakia'
        ]);

	    $telekom->prefixes()->attach([1, 2, 3, 4, 5, 6, 7, 8]);

	    $orange = \App\Operator::create([
		    'name' => 'Orange Slovakia',
		    'description' => 'Orange operator',
		    'country' => 'Slovakia'
	    ]);

	    $orange->prefixes()->attach([9, 10, 11, 12, 13, 14, 15, 16]);

	    $telefonica = \App\Operator::create([
		    'name' => 'Telefonica Slovakia',
		    'description' => 'Telefonica aka O2',
		    'country' => 'Slovakia'
	    ]);

	    $telefonica->prefixes()->attach([18, 19, 20, 21]);

	    $funFon = \App\Operator::create([
		    'name' => 'FunFon',
		    'description' => 'FunFon is part of the Orange Slovakia',
		    'country' => 'Slovakia'
	    ]);

	    $funFon->prefixes()->attach(17);

	    $swan = \App\Operator::create([
		    'name' => 'SWAN Mobile',
		    'description' => 'Or as know as  4KA',
		    'country' => 'Slovakia'
	    ]);

	    $swan->prefixes()->attach(22);
    }
}
