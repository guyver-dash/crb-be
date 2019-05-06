<?php

use Illuminate\Database\Seeder;
use App\Imports\CollectorsImport;

class CollectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CollectorsImport, public_path().'/csv/collector.csv');
    }
}
