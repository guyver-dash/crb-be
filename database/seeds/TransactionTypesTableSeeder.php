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
        $transactionTypes = ['Disbursement Journal', 'Receipt Journal', 'Sales Journal', 'Purchase Journal', 'General Journal'];
        $faker = Faker\Factory::create();

        for($i=0; $i < count($transactionTypes) ; $i++){

            if($i === 0){
               $transType = TransactionType::create([
                    'taccount_id' => 1,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 1,
                    'transaction_type_id' => $transType->id
                ]);
                $transType = TransactionType::create([
                    'taccount_id' => 1,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 2,
                    'transaction_type_id' => $transType->id
                ]);

            }else if($i === 1){
              

                $transType = TransactionType::create([
                    'taccount_id' => 2,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 1,
                    'transaction_type_id' => $transType->id
                ]);

                $transType = TransactionType::create([
                    'taccount_id' => 2,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 2,
                    'transaction_type_id' => $transType->id
                ]);
            
            }else if($i === 2){
                $transType =TransactionType::create([
                    'taccount_id' => 2,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 2,
                    'transaction_type_id' => $transType->id
                ]);
                
            }else if($i === 3 ){
                $transType =TransactionType::create([
                    'taccount_id' => 1,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 2,
                    'transaction_type_id' => $transType->id
                ]);
            }else{
                $transType =TransactionType::create([
                    'taccount_id' => null,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 1,
                    'transaction_type_id' => $transType->id
                ]);

                $transType =TransactionType::create([
                    'taccount_id' => null,
                    'name' => $transactionTypes[$i]
                ]);
                $t = TransactionType::find($transType->id);
                $t->accountingMethod()->attach($transType->id, [
                    'accounting_method_id' => 2,
                    'transaction_type_id' => $transType->id
                ]);
            }
        }

        
    }
}
