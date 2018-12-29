<?php

namespace App\Http\Controllers\API\Ingredient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Repo\Ingredient\IngredientInterface;

class IngredientController extends Controller
{


    protected $ingredient;

    public function __construct(IngredientInterface $ingredient)
    {
        $this->authorizeResource(Ingredient::class);
        $this->ingredient = $ingredient;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json([
            'ingredients' => $this->ingredient->paginate(
                $this->ingredient
                    ->where('name', 'like', '%'. app()->make('request')->filter . '%')
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient, Request $request)
    {
       return response()->json([
            'ingredient' => $this->ingredient->where('id',$request->id)
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
    public function update(Ingredient $ingredient, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient, Request $request)
    {
        //
    }

}
