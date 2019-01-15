<?php

namespace App\Http\Controllers\API\Modelable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Item;
use App\Repo\BaseRepository;
use App\Model\ChartAccount;

class ModelableController extends Controller
{
    

    public function userModels(Request $request){

        $userModels = $request->modelType::whereHas('accessRights.roles.users', function($q){
            // $q->where('users.id', Auth::User()->id);
        })
        // ->where('name', 'like', '%'. $request->name . '%')
        ->get();
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

    public function selectedItem(Request $request){
        $vendor = $request->modelType::where('id', $request->id)
                    ->relTable()
                    ->first();

        $baseRepository = new BaseRepository();
        
        return response()->json([
            'vendors' => $baseRepository->paginate(
                $vendor->items->filter(function($i) use ($request) {
                    if($request->string != ''){
                        return false !== stristr($i->name, $request->string);
                    }
                    return true;
                 })
            )
        ]);
    }

    public function chartAccount(Request $request){

        $chartAccounts = ChartAccount::
        /***
         * No chart_account access_rights relationship yet.
         */
        // whereHas('accessRights.roles.users', function($q){
        //     $q->where('users.id', Auth::User()->id);
        // })
            where('company_id', $request->companyId)
        ->where('parent_id', 0)
        ->relTable()
        ->get();

        return response()->json([
            'chartAccounts' => $chartAccounts
        ]);

    }
}
