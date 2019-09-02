<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Account;

class AccountController extends Controller
{
    public function index()
    {
        return Account::with('information')->with('branch')->get();
    }

    public function store(Request $request)
    {
        Account::create($request->all());

        return [
            'success' => true
        ];
    }

    public function show($id)
    {
        return Account::where('id', $id)->with('branch')->with('information')->get();
    }

    public function update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->update([
            'branch_id' => $request->branch_id,
            'information_id' => $request->information_id,
            'savings_id' => $request->savings_id,
            'status' => $request->status
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Account::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
