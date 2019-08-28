<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Account;

class AccountController extends Controller
{
    public function index()
    {
        //
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Account::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
