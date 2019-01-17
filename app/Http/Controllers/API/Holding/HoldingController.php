<?php

namespace App\Http\Controllers\API\Holding;

use App\Http\Controllers\Controller;
use App\Model\Holding;
use App\Repo\Holding\HoldingInterface;
use Auth;
use Illuminate\Http\Request;

class HoldingController extends Controller
{

    protected $holdingRepo;

    public function __construct(HoldingInterface $holding)
    {
        $this->holdingRepo = $holding;
        $this->authorizeResource(Holding::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            /***
             * entityNameAddress() location App/Repo/BaseRepository
             */
            'holdings' => $this->holdingRepo->paginate($this->holdingRepo->entityNameAddress(app()->make('request'))
                    ->relTable()
                    ->orderBy('created_at', 'desc')
                    ->get()
            ),

        ];

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->holdingRepo->create($request->all());
        if ($result === TRUE) {
            return [
                'success' => 1,
                'message' => 'Successfully created holding '.$request['name'].'.',
            ];
        } else {
            return response([
                'success' => 0,
                'message' => $result,
            ], 500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Holding $holding, Request $request)
    {
        return response()->json([
            'holding' => $this->holdingRepo->where('id', $request->id)->relTable()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holding $holding, Request $request)
    {

        return response()->json([
            'holding' => $this->holdingRepo->where('id', $request->id)->relTable()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Holding $holding, Request $request)
    {
        // $holding = $this->holdingRepo->where('id', $request->id)->first();
        // return $request->all();
        //if($holding){
            $result = $this->holdingRepo->update($request->all());
            return $result;
        //}

        // $holding = $this->holdingRepo->where('id', $request->id)->first();

        // $holding->update($request->all());
        // $holding->address()->update(
        //     $this->holdingRepo->addressFillable($request->all())
        // );
        // $holding->businessInfo()->update(
        //     $this->holdingRepo->businessInfoFillable($request->all())
        // );

        // return response()->json([
        //     'holding' => $this->holdingRepo->where('id', $request->id)->first(),
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holding $holding, Request $request)
    {
        $holding = $this->holdingRepo->find($request->id);
        $holding->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    public function userHoldings()
    {
        $holdings = Holding::whereHas('accessRights.roles.users', function ($q) {
            return $q->where('users.id', Auth::User()->id);
        })->get();
        return response()->json([
            'userHoldings' => $holdings,
        ]);

    }

    public function getRandomHoldings()
    {
        $holdings = Holding::inRandomOrder()->limit(5)->get();
        if ($holdings) {
            return $holdings;
        }
    }

    public function getHoldingsByName($holding)
    {
        $holdings = Holding::where('name', 'LIKE', "%$holding%")
            ->orWhere('desc', 'LIKE', "%$holding%")
            ->take($limit)
            ->get();
        if ($holdings) {
            return $holdings;
        }
    }

    public function paginate($collection)
    {

        $request = app()->make('request');
        $perPage = $request->perPage === '0' ? $collection->count() : $request->perPage;

        // return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
        return new LengthAwarePaginator($collection->forPage($request->page, $perPage), $collection->count(), $perPage, $request->page);
    }

    /**
     * @api
     * @param $request
     * @return pagination object
     * @todo use it for future searching instead of the index function
     */
    public function getHoldings()
    {
        $request = app()->make('request');

        $sortDirection = $request->descending === 'false' ? 'asc' : 'desc';

        $holdings = Holding::where('name', 'like', '%' . $request->filter . '%')
            ->when($request->sortBy === 'name', function ($q) use ($sortDirection) {
                $q->orderBy('name', $sortDirection);
            })
            ->orWhereHas('address', function ($q1) use ($request) {
                $q1->where('street_lot_blk', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.brgy', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.province', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.city', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.region', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->relTable()->get();

        return response()->json([

            'holdings' => $this->paginate($holdings),
            'sortBy' => $request->sortBy,
            'descending' => $request->descending,
            'direction' => $sortDirection,

        ]);
    }

    public function createAsyncValidation($fieldName, $val)
    {
        $result = $this->holdingRepo->createValidationByField([ $fieldName => $val ]);
        if ($result === TRUE) {
            return [
                'success' => 1
            ];
        } else {
            return response([
                'success' => 0,
                'message' => $result,
            ], 500);
        }
        
    }

    public function updateAsyncValidation($fieldName, $val, $id)
    {
        $result = $this->holdingRepo->updateValidationByField([ $fieldName => $val ], $id);
        if ($result === TRUE) {
            return [
                'success' => 1
            ];
        } else {
            return response([
                'success' => 0,
                'message' => $result,
            ], 500);
        }
        
    }

}
