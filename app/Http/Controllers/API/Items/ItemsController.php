<?php

namespace App\Http\Controllers\Api\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Model\Province;
use App\Model\City;
use App\Model\Brgy;
use App\Model\Item;
use App\Model\ItemInfo;
use App\Model\Image;
use Illuminate\Pagination\LengthAwarePaginator;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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

        JWTAuth::setToken($request->token);
        $user = JWTAuth::toUser($request->token);

        $item = Item::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'amount' => $request->amount,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'status' => $request->status
            ]);

        $user = JWTAuth::toUser($request->token);
        $arrayPathUrl = [];
        foreach ($request->images as $key => $image) {

            $imageData = $image['dataURL'];
            list($type, $imageData) = explode(';', $imageData);
            list(,$extension) = explode('/',$type);
            list(,$imageData)      = explode(',', $imageData);
            $fileName = uniqid().'.'.$extension;
            $imageData = base64_decode($imageData);
            $pathUrl = '/images/uploads/' . $fileName;
            array_push($arrayPathUrl, $pathUrl);

            \File::put(public_path(). $pathUrl,  $imageData);
            
        }

        if (count($request->city_ids) > 1) {

            foreach ($request->city_ids as $citymunCode) {

                $brgys = Brgy::where('citymunCode', $citymunCode)->get();

                foreach ($brgys as $brgy) {

                    $itemInfo = ItemInfo::create([
                        'item_id' => $item->id,
                        'user_id' => $user->id,
                        'store_id' => $request->store_id,
                        'branch_id' => $request->branch_ids,
                        'unit_id' => $request->unit_ids,
                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'further_category_id' => $request->further_category_id,
                        'provCode' => Province::where('provCode', $request->provCode)->first()->id,
                        'citymunCode' => City::where('citymunCode', $citymunCode)->first()->id,
                        'brgyCode' => $brgy->id
                        ]);

                    $this->uploadImgs($arrayPathUrl, $itemInfo);
                    $this->colorIds($itemInfo);

                    
                }
            }



        }
        else{

            //One city selected
            foreach ($request->city_ids as $citymunCode) {

                foreach ($request->brgy_ids as $brgyCode) {

                    $itemInfo = ItemInfo::create([
                        'item_id' => $item->id,
                        'user_id' => $user->id,
                        'store_id' => $request->store_id,
                        'branch_id' => $request->branch_ids,
                        'unit_id' => $request->unit_ids,
                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'further_category_id' => $request->further_category_id,
                        'provCode' => Province::where('provCode', $request->provCode)->first()->id,
                        'citymunCode' => City::where('citymunCode', $citymunCode)->first()->id,
                        'brgyCode' => Brgy::where('brgyCode', $brgyCode)->first()->id
                        ]);

                    $this->uploadImgs($arrayPathUrl, $itemInfo);
                    $this->colorIds($itemInfo);


                }
            }
        }



        return response()->json([
            'success' => true,
            'message' => 'Item created successfully!'
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return response()->json([
            'item' => ItemInfo::where('id', $id)->relTable()->first()
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function paginatePage($collection){

       $request = app()->make('request');
       return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);


   }

   public function createItemInfo($request){

   }

   public function uploadImgs($arrayPathUrl, $itemInfo){


        foreach ($arrayPathUrl as $key => $pathUrl) {


            if ($key == 1) {

                Image::create([
                    'path' => $pathUrl,
                    'imageable_id' => $itemInfo->id,
                    'imageable_type' => 'App\Model\Item',
                    'is_primary' => 1
                    ]);
            }else{

                Image::create([
                    'path' => $pathUrl,
                    'imageable_id' => $itemInfo->id,
                    'imageable_type' => 'App\Model\Item',
                    'is_primary' => 0
                    ]);
            }
        }
    }

    public function colorIds($itemInfo){

        $request = app()->make('request');

        foreach ($request->color_ids as $colorId) {
            
            $newItem = ItemInfo::find($itemInfo->id);
             $newItem->colors()->attach($itemInfo->id, [
                    'color_id' => $colorId,
                    'item_info_id' => $itemInfo->id
                ]);
        }
    }
}
