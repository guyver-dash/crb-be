<?php

use Illuminate\Database\Seeder;
use App\Model\CivilStatus;

class CivilStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $civilStatus = ['Single', 'Married', 'Divorced', 'Widow'];

        foreach($civilStatus as $c){
            CivilStatus::create([
                'name' => $c
            ]);
        }
    }
}
