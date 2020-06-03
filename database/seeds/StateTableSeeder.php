<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('states')->truncate();

        // create one state
        DB::table('states')->insert([
            [
                'name' => 'abuja',
	            'created_at' => now()
            ]
        ]);
    }
}
