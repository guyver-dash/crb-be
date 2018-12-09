<?php

namespace App\Http\Controllers\API\Category;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Category::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');

        $categories = Category::where('name', 'like', '%'.$request->filter . '%')
            ->where('parent_id', '=', 0)
            ->relTable()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'categories' => $categories
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
        
        Category::create([
            'category_id' => rand(1, 2),
            'category_type' => 'App\Model\Branch',
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Request $request)
    {
        $category = Category::where('id', $request->id)->relTable()->first();
       return response()->json([
           'category' => $category
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Request $request)
    {
       $category = Category::where('id', $request->id)->relTable()->first();
       return response()->json([
           'category' => $category
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category, Request $request)
    {
        $category = Category::find($request->id);
        $category->update($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}