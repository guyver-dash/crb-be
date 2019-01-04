<?php

namespace App\Http\Controllers\API\Holding;

use App\Http\Controllers\Controller;
use App\Model\Holding;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repo\Holding\HoldingInterface;

class HoldingController extends Controller
{

    protected $holding;

    public function __construct(HoldingInterface $holding)
    {
        $this->holding = $holding;
        $this->authorizeResource(Holding::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $request = app()->make('request');

        // $sortDirection = $request->descending === 'false' ? 'asc' : 'desc';

        // $holdings = Holding::where('name', 'like', '%' . $request->filter . '%')
        //     ->when($request->sortBy === 'name', function ($q) use ($sortDirection) {
        //         $q->orderBy('name', $sortDirection);
        //     })
        //     ->orWhereHas('address', function ($q1) use ($request) {
        //         $q1->where('street_lot_blk', 'like', '%' . $request->filter . '%');
        //     })
        //     ->orWhereHas('address.brgy', function ($q1) use ($request) {
        //         $q1->where('description', 'like', '%' . $request->filter . '%');
        //     })
        //     ->orWhereHas('address.province', function ($q1) use ($request) {
        //         $q1->where('description', 'like', '%' . $request->filter . '%');
        //     })
        //     ->orWhereHas('address.city', function ($q1) use ($request) {
        //         $q1->where('description', 'like', '%' . $request->filter . '%');
        //     })
        //     ->orWhereHas('address.region', function ($q1) use ($request) {
        //         $q1->where('description', 'like', '%' . $request->filter . '%');
        //     })
        //     ->relTable()->get();

        return response()->json([
            /***
             * entityNameAddress() location App/Repo/BaseRepository
             */
            'holdings' => $this->holding->paginate(
                                $this->holding->entityNameAddress( app()->make('request') )
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holding = $this->holding->create($request->all());
        $holding = $this->holding->find($holding->id);
        $holding->address()->create($request->all());
        $holding->businessInfo()->create($request->all());

        return response()->json([
            'success' => $request->all(),
        ]);
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
            'holding' => $this->holding->where('id', $request->id)->relTable()->first()
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
            'holding' => $this->holding->where('id', $request->id)->relTable()->first()
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

        $holding = $this->holding->where('id', $request->id)->first();

        $holding->update($request->all());
        $holding->address()->update( 
            $this->holding->addressFillable( $request->all() )
        );
        $holding->businessInfo()->update(
            $this->holding->businessInfoFillable( $request->all() )
        );

        return response()->json([
            'holding' => $this->holding->where('id', $request->id)->first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holding $holding, Request $request)
    {
        $holding = $this->holding->find($request->id);
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

}
