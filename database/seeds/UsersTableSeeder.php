<?php

use App\Model\Address;
use App\Model\User;
use Illuminate\Database\Seeder;

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
            'information_id' => rand(1, 101),
            'username' => 'super-admin',
            'email' => 'superAdmin@pattys.com',
            'password' => Hash::make('23456789'),

        ]);

        $newUser = User::find($user->id);

        $user->roles()->attach($user->id, [
            'user_id' => $user->id,
            'role_id' => 1,
        ]);

        $user = User::create([
            'information_id' => rand(1, 101),
            'username' => 'store-admin',
            'email' => 'storeAdmin@pattys.com',
            'password' => Hash::make('23456789'),

        ]);

        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
            'user_id' => $user->id,
            'role_id' => 2,
        ]);

        $user = User::create([
            'information_id' => rand(1, 101),
            'username' => 'super-staff',
            'email' => 'superStaff@pattys.com',
            'password' => Hash::make('23456789'),

        ]);

        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
            'user_id' => $user->id,
            'role_id' => 3,
        ]);

        $user = User::create([
            'information_id' => rand(1, 101),
            'username' => 'store-staff',
            'email' => 'storeStaff@pattys.com',
            'password' => Hash::make('23456789'),

        ]);
        $newUser = User::find($user->id);
        $newUser->roles()->attach($user->id, [
            'user_id' => $user->id,
            'role_id' => 4,
        ]);

        for ($i = 1; $i < 99; $i++) {
            $user = User::create([
                'information_id' => rand(1, 101),
                'username' => $faker->userName,
                'email' => $faker->safeEmail,
                'password' => Hash::make('23456789'),
            ]);

            $newUser = User::find($user->id);
            $newUser->roles()->attach($user->id, [
                'user_id' => $user->id,
                'role_id' => rand(1, 17),
            ]);
        }

        for ($i = 1; $i < 103; $i++) {

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
