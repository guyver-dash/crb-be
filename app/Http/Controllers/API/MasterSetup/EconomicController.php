<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterSetup\Economic;

class EconomicController extends Controller
{
   
    public function index()
    {
        return Economic::all();
    }

    public function store(Request $request)
    {
        Economic::create($request->all());

        return [
            'success' => true
        ];
    }
    
    function show($id)
    {
        return Economic::find($id);
    }

    public function update(Request $request, $id)
    {
        $economic = Economic::find($id);
        $economic->update([
            'description' => $request->description,
            'isAgricultural' => $request->isAgricultural
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Economic::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
