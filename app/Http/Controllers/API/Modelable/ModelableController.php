<?php

namespace App\Http\Controllers\API\Modelable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ModelableController extends Controller
{
    

    public function userModels(Request $request){

        $userModels = $request->modelType::whereHas('accessRights.roles.users', function($q){
            // return $q->where('users.id', Auth::User()->id);
        })->get();
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
}
