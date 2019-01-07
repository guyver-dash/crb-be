<?php

use Illuminate\Database\Seeder;
use App\Model\AccountingStandard;

class AccountingStandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $masks = [ 'IAS' => '##-####-##-##', 'BSP' => '##-##-##-##-##', 'NGAS' => '##-##-##-##-##'];

        foreach($masks as $key => $value){
            AccountingStandard::create([
                'name' => $key,
                'mask' => $value
            ]);
        }

    }
}
