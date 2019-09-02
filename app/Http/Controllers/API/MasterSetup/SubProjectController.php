<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterSetup\SubProject;

class SubProjectController extends Controller
{
    public function index()
    {
        return SubProject::all();
    }

    public function store(Request $request)
    {
        SubProject::create($request->all());

        return [
            'success' => true
        ];
    }
    
    function show($id)
    {
        return SubProject::find($id);
    }

    public function update(Request $request, $id)
    {
        $Project = SubProject::find($id);
        $Project->update([
            'description' => $request->description,
            'isOtherAgricultural' => $request->isOtherAgricultural
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        SubProject::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
