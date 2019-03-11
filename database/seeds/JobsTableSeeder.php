<?php

use Illuminate\Database\Seeder;
use App\Model\Job;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 98; $i++) { 
        	Job::create([
                'jobable_id' => $i,
                'jobable_type' => 'App\Model\Branch',
                'name' => 'Purchase Jobs first'. $i
            ]);
        }

        for ($i=1; $i < 98; $i++) { 
        	Job::create([
                'jobable_id' => $i,
                'jobable_type' => 'App\Model\Branch',
                'name' => 'Purchase Jobs second'. $i
            ]);
        }
    }
}
