<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('products')->truncate();
        // DB::table('images')->truncate();

        $faker = Factory::create();
        $products = []; 
        $images = [];
        
        for($i = 1; $i <= 1000; $i++) {

            $cat_id = rand(1, 8);
            $cat_type = [
                1 => [27, 34, 31, 33, 32, 30, 29, 28, 35],
                2 => [1, 38, 2, 40, 41, 42, 36, 39, 37],
                3 => [43, 49, 26, 46, 50, 44, 45, 48, 47],
                4 => [55, 23, 54, 56, 53, 52, 51, 25, 24],
                5 => [58, 57, 59, 60, 61, 20, 22, 21, 19],
                6 => [10, 12, 13, 14, 15, 16, 17, 18, 11],
                7 => [63, 64, 65, 66, 67, 62, 7, 8, 9],
                8 => [4, 68, 69, 70, 71, 72, 6, 5, 73],
            ];

            $products[] = [
                'name'           => $faker->words($nb = rand(2, 5), $asText = true),
                'weight'         => rand(3, 20),
                'price'          => rand(200, 100000),
                'sales_price'    => rand(0, 1) ? rand(200, 30000) : 0,
                'user_id'        => rand(103, 122),
                'supermarket_id' => rand(1, 4),
                'category_id'    => $cat_id,
                'type_id'    => $cat_type[$cat_id][rand(0, 8)],
                'description'    => $faker->sentence($nbWords = rand(10, 20)),
                'slug'           => $faker->slug,
                'created_at'     => $faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null)
            ];

            for($k = 2; $k <= 6; $k++) {
                if(rand(0, 1)) {
                    $images[] = [
                        'name' => 'image'. $k . '_'. $k .'.png',
                        'imageable_id' => $i,
                        'imageable_type' => 'App\Product'
                    ];
                }
            }

            $images[] = [
                'name' => 'image1_'. rand(1, 20) .'.png',
                'imageable_id' => $i,
                'imageable_type' => 'App\Product'
            ];
        }

        DB::table('products')->insert($products);
        DB::table('images')->insert($images);
        
    }
}
