<?php

namespace App\Http\Controllers\API\MasterSetup;

use App\Http\Controllers\Controller;
use App\Model\MasterSetup\LoanCategory;
use Illuminate\Http\Request;

class lmmCategoryController extends Controller
{

    public function index()
    {
        return LoanCategory::get();
    }

    public function store(Request $request)
    {

        LoanCategory::create($request->all());
        return response()->json([
            'success' => true,
        ]);
    }

    public function show($id)
    {

        return response()->json([
            'loanCategory' => LoanCategory::where('parent_id', $id)->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
