<?php

namespace App\Imports;

use App\Model\TempDailyTrans;
use Maatwebsite\Excel\Concerns\ToModel;

class TempDailyTransImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TempDailyTrans([
            'name'     => $row[0],
           'email'    => $row[1], 
           'password' => Hash::make($row[2])
        ]);
    }
}
