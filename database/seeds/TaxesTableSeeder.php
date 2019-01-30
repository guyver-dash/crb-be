<?php

use Illuminate\Database\Seeder;
use App\Model\Tax;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Tax::create([
            'percent' => 12,
            'default' => true
        ]);
    }
}
