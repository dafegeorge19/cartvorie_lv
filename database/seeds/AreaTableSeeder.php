<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('areas')->truncate();


        // create 5 areas
        DB::table('areas')->insert([
            [
                'name' => 'wuse 2',
                'state_id' => 1,
	            'created_at' => now()
            ],
            [
                'name' => 'durummi',
                'state_id' => 1,
	            'created_at' => now()
            ],
            [
                'name' => 'maitama',
                'state_id' => 1,
	            'created_at' => now()
            ],
            [
                'name' => 'life camp',
                'state_id' => 1,
	            'created_at' => now()
            ]
        ]);
    }
}
