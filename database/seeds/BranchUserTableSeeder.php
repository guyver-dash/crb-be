<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class BranchUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 5; $i++) { 
            
            $user = User::find(5);
            $user->branches()->attach($i, [
                'user_id' => $i,
                'branch_id' => $i,
                'default' => 1
            ]);
        }
    }
}
