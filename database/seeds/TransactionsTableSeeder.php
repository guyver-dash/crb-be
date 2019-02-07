<?php
use Illuminate\Database\Seeder;
use App\Model\Transaction;
use App\Model\Company;
class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
            for($a=1; $a < 99; $a++) {
                foreach(Company::find($a)->chartAccounts as $chartAccount){
                    $trans = new Transaction();
                    $trans->transactable_id = $a;
                    $trans->transactable_type = 'App\Model\Branch';
                    $trans->transaction_type_id = rand(1, 5);
                    $trans->chart_account_id = $chartAccount->id;
                    $trans->refnum =  str_replace('0.', '', microtime() . uniqid(true));
                    $trans->total_amount = rand(200, 50000);
                    $trans->remarks = 'remarks ' . $a;
                    $trans->status = rand(0, 1);
                    $trans->created_by = rand(1, 99);
                    $trans->save();
                    $trans = Transaction::find($trans->id);
                    $trans->payee()->create([
                        'transaction_id' => $trans->id,
                        'payable_id' => $a,
                        'payable_type' => 'App\Model\Branch'
                    ]);
                }
                
            }
            for($a=1; $a < 99; $a++) {
                foreach(Company::find($a)->chartAccounts as $chartAccount){
                    $trans = new Transaction();
                    $trans->transactable_id = $a;
                    $trans->transactable_type = 'App\Model\Logistic';
                    $trans->transaction_type_id = rand(1, 5);
                    $trans->chart_account_id = $chartAccount->id;
                    $trans->refnum =  str_replace('0.', '', microtime() . uniqid(true));
                    $trans->total_amount = rand(200, 50000);
                    $trans->remarks = 'remarks ' . $a;
                    $trans->status = rand(0, 1);
                    $trans->created_by = rand(1, 99);
                    $trans->save();
                    $trans = Transaction::find($trans->id);
                    $trans->payee()->create([
                        'transaction_id' => $trans->id,
                        'payable_id' => $a,
                        'payable_type' => 'App\Model\Logistic'
                    ]);
                }
                
            }
            for($a=1; $a < 99; $a++) {
                foreach(Company::find($a)->chartAccounts as $chartAccount){
                    $trans = new Transaction();
                    $trans->transactable_id = $a;
                    $trans->transactable_type = 'App\Model\Commissary';
                    $trans->transaction_type_id = rand(1, 5);
                    $trans->chart_account_id = $chartAccount->id;
                    $trans->refnum = str_replace('0.', '', microtime() . uniqid(true));
                    $trans->total_amount = rand(200, 50000);
                    $trans->remarks = 'remarks ' . $a;
                    $trans->status = rand(0, 1);
                    $trans->created_by = rand(1, 99);
                    $trans->save();
                }
                $trans = Transaction::find($trans->id);
                    $trans->payee()->create([
                        'transaction_id' => $trans->id,
                        'payable_id' => $a,
                        'payable_type' => 'App\Model\Commissary'
                    ]);
                
            }
    }
}