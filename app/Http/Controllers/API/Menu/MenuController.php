<?php

namespace App\Http\Controllers\API\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class MenuController extends Controller
{
    
    public function categories(){

    	return response()->json([
    			'categories' => Category::with(['subcategories.furtherCategories'])->get()
    		]);
    }

}
