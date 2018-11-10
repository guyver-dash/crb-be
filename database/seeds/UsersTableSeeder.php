<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Right;

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
        		'email' => 'superAdmin@pattys.com',
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
                'email' => 'storeAdmin@pattys.com',
                'password' => Hash::make('23456789')

            ]);

        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 12
            ]);

        $user = User::create([
                'firstname' => 'Super',
                'lastname' => 'Super Manager',
                'middlename' => 'middlename',
                'email' => 'superStaff@pattys.com',
                'password' => Hash::make('23456789')

            ]);

        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 2
            ]);

         $user = User::create([
                'firstname' => 'Store',
                'lastname' => 'Store CEO',
                'middlename' => 'middlename',
                'email' => 'storeStaff@pattys.com',
                'password' => Hash::make('23456789')

            ]);
        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => 13
            ]);



        for ($i=1; $i < 5; $i++) { 
           
           $user = User::find($i);
           $user->rights()->attach([$i]);
        }
    }
}
