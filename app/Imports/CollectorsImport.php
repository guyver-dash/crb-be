<?php

namespace App\Imports;

use App\Model\MasterSetup\Collectors;
use Maatwebsite\Excel\Concerns\ToModel;

class CollectorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Collectors([
            'name'     => $row[0],
            'branch_id'    => $row[1], 
        ]);
    }
}
