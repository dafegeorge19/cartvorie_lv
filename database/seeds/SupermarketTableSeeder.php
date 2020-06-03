<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupermarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('supermarkets')->truncate();

        $faker = Factory::create();
        $supermarkets = []; 

        for($i = 1; $i <= 20; $i++) {
            
            $supermarkets[] = [
                'name'           => $faker->company,
                'slug'           => $faker->slug,
                'description'    => $faker->sentence($nbWords = rand(10, 20)),
                'state_id'       => 1,
                'area_id'        => rand(1, 4),
                'street_address' => $faker->streetAddress,
                'created_at'     => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
            ];

        }

        DB::table('supermarkets')->insert($supermarkets);
        
    }
}
