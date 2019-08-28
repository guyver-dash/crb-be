<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\LoanCategory;
use App\Model\MasterSetup\LoanCode;


class LoanCodeController extends Controller
{
    public function store(Request $request)
    {
       	$loanCategory = LoanCategory::create($request->all());

       	$request = $request->all();
       	$request['loan_categories_id'] = $loanCategory->id;
        LoanCode::create($request);

        return response()->json([
            'success' => true
        ]);

    }

    public function show($id)
    {

       return response()->json([
            'loanCode' => LoanCode::with('loanCategory')->where('id', $id)->get()
        ]);
    }
}
