<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterSetup\Funder;

class FunderController extends Controller
{
    public function index()
    {
        return Funder::with('branch')->get();
    }

    public function store(Request $request)
    {
        Funder::create($request->all());

        return [
            'success' => true
        ];
    }
    
    function show($id)
    {
        return Funder::where('id', $id)->with('branch')->get();
    }

    public function update(Request $request, $id)
    {
        $Funder = Funder::find($id);
        $Funder->update([
            'name' => $request->name,
            'subname' => $request->subname
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Funder::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
