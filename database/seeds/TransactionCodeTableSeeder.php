<?php

use App\Model\Loans\TransactionCode;
use Illuminate\Database\Seeder;

class TransactionCodeTableSeeder extends Seeder
{

    public function run()
    {
        $code = array(
            'CASH PAYMENT' => ["symbol" => "CSPM", "code" => 2],
            'CHECK PAYMENT' => ["symbol" => "CHK0", "code" => 3],
            'CREDIT MEMO (LOANS)' => ["symbol" => "CRMEL", "code" => 364],
            'CREDIT MEMO (SAVINGS)' => ["symbol" => "CRMES", "code" => 365],
            'DEBIT MEMO (LOANS)' => ["symbol" => "DBMEL", "code" => 193],
            'DEBIT MEMO (SAVINGS)' => ["symbol" => "DBMES", "code" => 194],
            'DISBURSEMENT' => ["symbol" => "DISB", "code" => 2],
            'ERROR CORRECT' => ["symbol" => "ECC", "code" => 1],
        );

        foreach ($code as $key => $val) {
            TransactionCode::create([
                'details' => $key,
                'symbol' => $val['symbol'],
                'chart_account_id' => $val['code'],
            ]);
        }
    }
}
