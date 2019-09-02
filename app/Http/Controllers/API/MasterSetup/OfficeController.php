<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Office;

class OfficeController extends Controller
{
    
    public function index()
    {
        return Office::with('branch')->get();
    }

    public function store(Request $request)
    {
        Office::create($request->all());

        return [
            'success' => true
        ];
    }

    public function show($id)
    {
        return Office::where('id', $id)->with('branch')->get();
    }

    public function update(Request $request, $id)
    {
        $office = Office::find($id);
        $office->update([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Office::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
