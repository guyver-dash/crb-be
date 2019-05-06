<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\LoanCenter;

class LoanCentersController extends Controller
{
    public function store(Request $request)
    {
       	LoanCenter::create($request->all());
        return response()->json([
            'success' => true,
        ]);
    }

    public function showAll()
    {
        return response()->json([
            'loan_center_list' => LoanCenter::get()
        ]);
    }

    public function show($id)
    {
    	
    	return response()->json([
            'loan_center_info' => LoanCenter::where('id', $id)->get()
        ]);
    }

    public function showAllBranch($branch_id)
    {
    	return response()->json([
            'loan_center_branch' => Collectors::where('branch_id', $branch_id)->get()
        ]);
    }




}
