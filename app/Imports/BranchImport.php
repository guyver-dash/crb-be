<?php

namespace App\Imports;

use App\Model\Branch;
use Maatwebsite\Excel\Concerns\ToModel;

class BranchImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Branch([
            'code'     => $row[0],
            'name'    => $row[1], 
            'branch_address' => $row[2]. ', '. $row[3],
            'initial' => $row[4],
            'tel' => $row[5],
            'bir' => $row[6]
        ]);
    }
}
