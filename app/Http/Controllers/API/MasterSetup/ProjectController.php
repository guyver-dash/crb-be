<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterSetup\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store(Request $request)
    {
        Project::create($request->all());

        return [
            'success' => true
        ];
    }
    
    function show($id)
    {
        return Project::find($id);
    }

    public function update(Request $request, $id)
    {
        $Project = Project::find($id);
        $Project->update([
            'description' => $request->description,
            'isAgricultural' => $request->isAgricultural,
            'isMicro' => $request->isMicro
        ]);

        return [
            'success' => true
        ];
    }

    public function destroy($id)
    {
        Project::find($id)->delete();

        return [
            'success' => true
        ];
    }
}
