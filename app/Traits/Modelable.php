<?php 

namespace App\Traits;
use Illuminate\Http\Request;
use App\Model\Holding;
use App\Model\Company;
use App\Model\Branch;

trait Modelable
{
    public function holding(Request $request){
        $holding = Holding::where('id', $request->id)->relTable()->first();
        return response()->json([
            'address' => $holding->address,
            'businessInfo' => $holding->businessInfo
        ]);
    }

    public function company(Request $request){
        $company = Company::where('id', $request->id)->relTable()->first();
        return response()->json([
            'address' => $company->address,
            'businessInfo' => $holding->businessInfo
        ]);
    }

    public function branch(Request $request){
        $branch = Branch::where('id', $request->id)->relTable()->first();
        return response()->json([
            'address' => $branch->address,
            'businessInfo' => $holding->businessInfo
        ]);
    }
}