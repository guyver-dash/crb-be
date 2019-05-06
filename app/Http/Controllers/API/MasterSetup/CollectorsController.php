<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Collectors;
use App\Model\MasterSetup\LoanCenter;

class CollectorsController extends Controller
{
    public function store(Request $request)
    {
       	Collectors::create($request->all());
        return response()->json([
            'success' => true,
        ]);
    }

    public function showAll()
    {
        return response()->json([
            'collector_list' => Collectors::get()
        ]);
    }

    public function show($id)
    {
    	return response()->json([
            'collector_info' => Collectors::where('id', $id)->get()
        ]);
    }

    public function showAllBranch($branch_id)
    {
    	return response()->json([
            'collector_list_branch' => Collectors::where('branch_id', $branch_id)->with('LoanCenter')->get()
        ]);
    }   


}
