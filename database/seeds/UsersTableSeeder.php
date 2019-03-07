<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Address;

class UsersTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $user = User::create([
        		'firstname' => 'super',
        		'lastname' => 'admin ',
                'middlename' => 'middlename',
                'username' => 'super-admin',
                'mobile' => $faker->phoneNumber,
        		'email' => 'superAdmin@a2r-online.com',
        		'password' => Hash::make('23456789')
        	]);
        $newUser = User::find($user->id);
        $user->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 1
            ]);
       $user = User::create([
                'firstname' => 'store',
                'lastname' => 'admin',
                'middlename' => 'middlename',
                'username' => 'store-admin',
                'mobile' => $faker->phoneNumber,
                'email' => 'storeAdmin@a2r-online.com',
                'password' => Hash::make('23456789')
            ]);
        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 2
            ]);
        $user = User::create([
                'firstname' => 'Super',
                'lastname' => 'Super Manager',
                'middlename' => 'middlename',
                'username' => 'super-staff',
                'mobile' => $faker->phoneNumber,
                'email' => 'superStaff@a2r-online.com',
                'password' => Hash::make('23456789')
            ]);
        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 3
            ]);
         $user = User::create([
                'firstname' => 'Store',
                'lastname' => 'Store CEO',
                'middlename' => 'middlename',
                'username' => 'store-staff',
                'mobile' => $faker->phoneNumber,
                'email' => 'storeStaff@a2r-online.com',
                'password' => Hash::make('23456789')
            ]);
        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 4
            ]);
            for ($i=1; $i < 99; $i++) { 
                $user = User::create([
                    'firstname' => $faker->firstName('male'|'female'),
                    'lastname' => $faker->lastName,
                    'middlename' => $faker->firstNameFemale,
                    'username' => $faker->userName,
                    'mobile' => $faker->phoneNumber,
                    'email' => $faker->safeEmail,
                    'password' => Hash::make('23456789')
                ]);
                $newUser = User::find($user->id);
                $newUser->roles()->attach($user->id,[
                    'user_id'   => $user->id,
                    'role_id' => rand(1, 17)
                ]);
            }
            for ($i=1; $i < 103; $i++) { 
            
                $user = User::find($i);
    
                $newAddress = new Address();
                $newAddress->street_lot_blk = $faker->streetAddress;
                $newAddress->latitude = $faker->latitude($min = 9, $max = 11); 
                $newAddress->longitude = $faker->longitude($min = 122, $max = 124);
                $newAddress->country_id = 173;
                $newAddress->region_id = rand(1, 17);
                $newAddress->province_id = rand(1, 88);
                $newAddress->city_id = rand(1, 1647);
                $newAddress->brgy_id = rand(1, 42029);
                $user->address()->save($newAddress);
    
            }
    }
}
