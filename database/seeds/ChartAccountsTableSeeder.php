<?php

use Illuminate\Database\Seeder;
use App\Imports\ChartAccountImport;

class ChartAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Excel::import(new ChartAccountImport, public_path().'/csv/chartofaccounts.csv');

    }
}
