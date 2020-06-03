<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('addresses')->truncate();

        // create one user
        DB::table('addresses')->insert([
            [
                'user_id' => 1,
	            'state_id' => 1,
	            'area_id' => 1,
	            'street_Address' => 'no.1 kundang street, opposite banex',
	            'created_at' => now()
            ],
            [
                'user_id' => 1,
	            'state_id' => 1,
	            'area_id' => 1,
	            'street_Address' => 'shop 24, wuse market',
	            'created_at' => now()
            ]

        ]);
    }
}
