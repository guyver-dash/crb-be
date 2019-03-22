<?php

namespace App\Imports;

use App\Model\ChartAccount;
use Maatwebsite\Excel\Concerns\ToModel;

class ChartAccountImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ChartAccount([
            'account_code'     => $row[0],
            'parent_code'    => $row[1], 
            'name' => $row[2],
            'account_display' => $row[3],
            'taccount_id' => $row[4]
        ]);

    }
}
