<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(StateTableSeeder::class);
        // $this->call(AreaTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        // $this->call(AddressTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(SupermarketTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
