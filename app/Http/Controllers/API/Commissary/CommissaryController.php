<?php

namespace App\Http\Controllers\API\Commissary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Commissary;
use App\Traits\PaginateCollection;

class CommissaryController extends Controller
{
    use PaginateCollection;

    public function __construct(){

        $this->authorizeResource(Commissary::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([

            'commissaries' => $this->paginate(
                Commissary::where('name', 'like', '%'. app()->make('request')->filter . '%')
                        ->relTable()
                        ->orderBy('created_at', 'desc')
                        ->get()
            )

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Commissary $commissary, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commissary $commissary, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commissary $commissary, Request $request)
    {
        return response()->json([
            'commissary' => Commissary::where('id', $request->id)
                            ->relTable()
                            ->first()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Commissary $commissary, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commissary $commissary, Request $request)
    {
        //
    }
}
