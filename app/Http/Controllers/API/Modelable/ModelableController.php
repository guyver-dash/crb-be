<?php

namespace App\Http\Controllers\API\Modelable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Item;

class ModelableController extends Controller
{
    

    public function userModels(Request $request){

        $userModels = $request->modelType::whereHas('accessRights.roles.users', function($q){
            // $q->where('users.id', Auth::User()->id);
        })->where('name', 'like', '%'. $request->name . '%')->get();
        return response()->json([
            'userModels' => $userModels
        ]);

    }

    public function addressBusinessInfo(Request $request){
        $model = $request->modelType::where('id', $request->id)->relTable()->first();
        return response()->json([
            'address' => $model->address,
            'businessInfo' => $model->businessInfo
        ]);
    }

    // public function selectedItem(Request $request){
    //     $item = Item::whereHas('accessRights.roles.users', function($q){
    //         $q->where('users.id', Auth::User()->id);
    //     })->where('id', $request->itemId)->first();

    //     $entities = collect([$item->branches, $item->commissaries, $item->otherVendors, $item->logistics]);
    //     return response()->json([
    //         'vendors' => $entities->flatten(1)
    //     ]);
    // }
}
