<?php

use Illuminate\Database\Seeder;
use App\Model\Classs;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = ['Stock Item', 'Non-Stock', 'Description Only', 'Services', 'Labor', 'Assembly', 'Activity', 'Charge'];

        $types = ['INGREDIENTS', 'PRODUCT', 'NON-BREAD', 'SUPPLY', 'EQUIPMENT'];
        foreach($classes as $class){

            Classs::create([
                    'classable_type' => 'App\Model\Branch',
                    'classable_id' => rand(1, 2),
                    'name' => $class,
                    'desc' => $class,
                    'parent_id' => 0
                ]);
        }

        foreach($types as $type){

            Classs::create([
                'classable_type' => 'App\Model\Branch',
                'classable_id' => rand(1, 2),
                'name' => $class,
                'desc' => $class,
                'parent_id' => 1
            ]);
        }
        
    }
}
