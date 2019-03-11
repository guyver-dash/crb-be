<?php

use Illuminate\Database\Seeder;
use App\Model\TransactionType;

class TransactionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionTypes = ['Disbursement Journal', 'Receipt Journal', 'General Journal'];
        $faker = Faker\Factory::create();

        for($i=0; $i < count($transactionTypes) ; $i++){

            if($i === 0){
               $transType = TransactionType::create([
                    'taccount_id' => 1,
                    'name' => $transactionTypes[$i]
                ]);

            }else if($i === 1){

                $transType = TransactionType::create([
                    'taccount_id' => 2,
                    'name' => $transactionTypes[$i]
                ]);
               
            
            }else if($i === 2){
                $transType =TransactionType::create([
                    'taccount_id' => 2,
                    'name' => $transactionTypes[$i]
                ]);
                
            }
        }

        
    }
}
