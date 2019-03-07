<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'computer' => 'Consumer Electronics',
            'perm_data_setting' => 'Machinery', 
            'extension' => 'Apparel', 
            'directions_car' => 'Automobiles & Motorcyles', 
            'local_florist' => 'Home & Garden', 
            'child_care' => 'Beauty & Personal Care', 
            'local_hospital' => 'Health & Medical', 
            'pool' => 'Sports & Entertainment'
        ];

        $computerElectronics = [
            'Camera & Accessories',
            'Mobile Phone & Parts',
            'Computer HardWare &Software',
            'Smart Electronics',
            'Video Games'
        ];
        
        foreach ($categories as $key => $value) {
        	Category::create([
                    'parent_id' => 0,
                    'name' => $value,
                    'icon' => $key,
                    'url' => str_slug($value, '-') 
        		]);
        }

        foreach ($computerElectronics as $key => $value) {
        	Category::create([
                    'parent_id' => 1,
                    'name' => $value,
                    'url' => str_slug($value, '-') 
        		]);
        }

    }
}
