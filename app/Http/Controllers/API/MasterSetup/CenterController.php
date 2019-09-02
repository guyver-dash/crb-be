<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Center;

class CenterController extends Controller
{

    public function index()
    {
        return Center::with('collector.information')->with('groups')->get();
    }

    public function store(Request $request)
    {
        Center::create($request->all());

        return [
            'success' => true
        ];
    }

    public function show($id) // parameter is COLLECTOR ID
    {
        $center = Center::whereHas('collector' , function($query) use ($id) {
            $query->where('id', $id);
        })->with('collector.information')->get();

        return $center;
    }

    public function update(Request $request, $id)
    {
        $center = Center::find($id);
        $center->update([
            'collector_id' => $request->collector_id,
            'name' => $request->name,
            'address' => $request->address
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Center::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
