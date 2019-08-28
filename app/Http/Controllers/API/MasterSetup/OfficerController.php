<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Officer;

class OfficerController extends Controller
{
    public function index()
    {
        return Officer::all();
    }

    public function store(Request $request)
    {
        $create = Officer::create($request->all());

        return [
            'success' => true
        ];
    }

    public function show($id)
    {
        return Officer::find($id);
    }

    public function update(Request $request, $id)
    {
        $officer = Officer::find($id);
        $officer->update([
            'designation_id' => $request->designation_id,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Officer::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
