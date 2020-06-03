<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();


        // create one user
        DB::table('users')->insert([
            [
                'first_name'   => 'jane',
                'other_names'  => 'boss girl',
                'phone_number' => '08123432323',
                'email'        => 'admin@skipoutlet.com',
                'role'         => 'superadmin',
                'password'     => Hash::make('11111111'),
                'created_at'   => now()
            ],
            [
                'first_name'   => 'john',
                'other_names'  => 'doe',
                'phone_number' => '08123432323',
                'email'        => 'john.doe@mail.com',
                'role'         => 'customer',
                'password'     => Hash::make('11111111'),
                'created_at'   => now()
            ]
        ]);

        $faker = Factory::create();
        $agents = [];
        $subadmin = [];
        $customers = [];
        $addresses = [];
        $agent_details = [];


        for($i = 3; $i <= 52; $i++) {
            $customers[] = [
                'first_name'        => $faker->firstNameMale,
                'other_names'       => $faker->lastName . ' ' . $faker->lastName,
                'phone_number'      => $faker->e164PhoneNumber,
                'email'             => $faker->freeEmail,
                'email_verified_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'role'              => 'customer',
                'password'          => Hash::make('11111111'),
                'created_at'        => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ];

            //generate agent details
            $agent_details[] = [
                'user_id' => $i,
                'cv_name' => $faker->md5 . '.doc',
            ];
            
            
        }

        // now create additonal 50 random restaurant users to populate database
        for($i = 53; $i <= 102; $i++) {
            
            // temporarily store all generated users into users variable
            $agents[] = [
                'first_name'        => $faker->firstNameMale,
                'other_names'       => $faker->lastName . ' ' . $faker->lastName,
                'phone_number'      => $faker->e164PhoneNumber,
                'email'             => $faker->freeEmail,
                'email_verified_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'role'              => 'agent',
                'password'          => Hash::make('11111111'),
                'created_at'        => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ];

            //generate agent details address too
            $agent_details[] = [
                'user_id' => $i,
                'cv_name' => $faker->md5,
            ];
            
            
        }

        // generate subadmins
        for($i = 103; $i <= 122; $i++) {
            // temporarily store all generated subadmin into users variable
            $subadmin[] = [
                'first_name'        => $faker->firstNameMale,
                'other_names'       => $faker->lastName . ' ' . $faker->lastName,
                'phone_number'      => $faker->e164PhoneNumber,
                'email'             => $faker->freeEmail,
                'email_verified_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'role'              => 'subadmin',
                'password'          => Hash::make('11111111'),
                'created_at'        => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ];
        }


        DB::table('users')->insert($customers);
        DB::table('users')->insert($agents);
        DB::table('agent_details')->insert($agent_details);
        DB::table('users')->insert($subadmin);


        // get the number of users in the database
        $users = User::all();
        $num_of_users = $users->count();

        // generate address for all the users
        for($i = 1; $i <= $num_of_users; $i++) {
            $addresses[] = [
                'user_id'        => $i,
                'state_id'       => 1,
                'area_id'        => rand(1, 3),
                'street_address' => $faker->streetAddress,
            ];
        }

        // now insert generated addresses into database
        DB::table('addresses')->insert($addresses);
        
    }
}
