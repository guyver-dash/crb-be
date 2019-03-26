<?php

namespace App\Imports;

use App\Model\Lending;
use Maatwebsite\Excel\Concerns\ToModel;

class LendingsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lending([
            'code'     => $row[0],
            'name'    => $row[1], 
            'subname' => $row[2],
            'priority' => $row[3],
            'brno' => $row[4],
            'orig_code' => $row[5],
            'isVisible' => $row[6]
        ]);
    }
}
