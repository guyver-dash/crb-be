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
            'trdatepost'     => $row[0],
            'trrefnum'    => $row[1], 
            'tracctnum' => $row[2],
            'trdebit' => $row[3],
            'trcredit' => $row[4],
            'trparticulars' => $row[5],
            'trno' => $row[6],
            'trtype' => $row[7],
            'trans_no' => $row[8],
            'trtime' => '2019-03-21 03:59:38',
            'teller' => $row[10],
            'brno' => $row[11],
            'trname' => $row[12],
            'traddr' => $row[13],
            'adjustment' => $row[14],
            'trn_seq' => $row[15],
            'vcFinance' => $row[16],
            'vcAppCode' => $row[17]
        ]);
    }
}
