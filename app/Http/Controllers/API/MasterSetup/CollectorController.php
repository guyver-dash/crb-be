<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\MasterSetup\Collector;

class CollectorController extends Controller
{
    public function index()
    {
        return Collector::all();
    }

    public function store(Request $request)
    {
        $create = Collector::create($request->all());

        return [
            'success' => true
        ];
    }

    public function show($id)
    {
        $collector = Collector::where('id', $id)->with('information')->with('center');

        return $collector->get();
    }

    public function update(Request $request, $id)
    {
        $collector = Collector::find($id);
        $collector->update([
            'information_id' => $request->information_id,
            'branch_id' => $request->branch_id,
            'imei' => $request->imei,
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Collector::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
