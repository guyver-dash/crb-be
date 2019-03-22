<?php

use Illuminate\Database\Seeder;
use App\Imports\TempDailyTransImport;

class TempDailyTransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new TempDailyTransImport, public_path().'/csv/tempdailytrans.csv');
    }
}
