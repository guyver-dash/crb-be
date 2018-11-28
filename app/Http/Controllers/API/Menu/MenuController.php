<?php

namespace App\Http\Controllers\API\Menu;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Menu;
use Auth;

class MenuController extends Controller
{

    public function __construct(Menu $menu){
        $this->authorizeResource(Menu::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        $menus = Menu::where('name', 'like', '%'.$request->filter . '%')
            ->userMenus()
            ->relTable()
            ->get();
        return response()->json([

            'menus' => $this->paginate($menus)
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
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu, Request $request)
    {
        
        $menu = Menu::where('id', $request->id)->relTable()->first();
        $superiorMenus =  Menu::superiors($menu->parent_id)->get();
        return response()->json([
            'menu' => $menu,
            'submenus' => $menu->allChildren,
            'superiorMenus' => $superiorMenus
            // 'parentMenu' => $menu->parent
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu, Request $request)
    {
        $menu = Menu::find($request->id);
        $menu->update($request->all());
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
    public function destroy(Menu $menu, Request $request)
    {
        //
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }

    
}
