<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();

        // create one user
        DB::table('categories')->insert([
            [
                'name'   => 'uncategorized',
                'slug'  => 'uncategorized',
            ]
            
        ]);

        $faker = Factory::create();
        $categories = []; 

        for($i = 1; $i <= 20; $i++) {
            
            $categories[] = [
                'name' => $faker->company,
                'slug' => $faker->slug,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
            ];

        }

        DB::table('categories')->insert($categories);
    }
}
