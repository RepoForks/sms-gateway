<?php

use Illuminate\Database\Seeder;

class NumberPrefixesTableSeeder extends Seeder
{
    public function run()
    {
        \App\NumberPrefix::create([
	        'id' => '1',
	        'prefix' => '901',
	        'description' => 'Slovak Telekom prefix'
        ]);

	    \App\NumberPrefix::create([
		    'id' => '2',
		    'prefix' => '902',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '3',
		    'prefix' => '903',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '4',
		    'prefix' => '904',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '5',
		    'prefix' => '910',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '6',
		    'prefix' => '911',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '7',
		    'prefix' => '912',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '8',
		    'prefix' => '914',
		    'description' => 'Slovak Telekom prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '9',
		    'prefix' => '905',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '10',
		    'prefix' => '906',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '11',
		    'prefix' => '907',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '12',
		    'prefix' => '908',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '13',
		    'prefix' => '915',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '14',
		    'prefix' => '916',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '15',
		    'prefix' => '917',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '16',
		    'prefix' => '918',
		    'description' => 'Orange prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '17',
		    'prefix' => '919',
		    'description' => 'FunFon prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '18',
		    'prefix' => '940',
		    'description' => 'Telefonica Slovakia prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '19',
		    'prefix' => '944',
		    'description' => 'Telefonica Slovakia prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '20',
		    'prefix' => '948',
		    'description' => 'Telefonica Slovakia prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '21',
		    'prefix' => '949',
		    'description' => 'Telefonica Slovakia prefix'
	    ]);

	    \App\NumberPrefix::create([
		    'id' => '22',
		    'prefix' => '950',
		    'description' => 'Swan Mobile prefix'
	    ]);

    }
}
