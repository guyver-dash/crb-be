<?php

use Illuminate\Database\Seeder;
use App\Model\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 98; $i++) { 
    		Image::create([
		        'path' => 'images/uploads/' . rand(1,67) . '.jpg',
		        'imageable_id' => $i,
		        'imageable_type' => 'App\Model\Holding',
		        'is_primary' => 1
    		]);
    	}

        for ($i=1; $i < 98; $i++) { 
            Image::create([
                'path' => 'images/uploads/' . rand(1,67) . '.jpg',
                'imageable_id' => $i,
                'imageable_type' => 'App\Model\Branch',
                'is_primary' => 1
            ]);
        }
        
    }
}
