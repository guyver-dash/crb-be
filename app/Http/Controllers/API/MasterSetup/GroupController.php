<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Group;

class GroupController extends Controller
{
    public function index()
    {
        return Group::with('center.collector.information')->get();
    }

    public function store(Request $request)
    {
        Group::create($request->all());

        return [
            'success' => true
        ];
    }

    public function show($id)
    {
        // $group = Group::where('center.id', $id)->with('center.collector.information')->get();
        $group = Group::whereHas('center' , function($query) use ($id) {
            $query->where('id', $id);
        })->with('center.collector.information')->get();

        return $group;
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->update([
            'center_id' => $request->center_id,
            'name' => $request->name,
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Group::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
