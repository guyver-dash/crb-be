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

    public function index()
    {
        return [
            'holdings' => $this->holdingRepo->paginate($this->holdingRepo->entityNameAddress(app()->make('request'))
                    ->relTable()
                    ->orderBy('created_at', 'desc')
                    ->get()
            ),
        ];

    }

    public function store(Request $request)
    {
        $result = $this->holdingRepo->create($request->all());
        return ($result === true)
        ? $this->holdingRepo->successApiResponse('Successfully created holding ' . $request['name'] . '.')
        : $this->holdingRepo->errorApiResponse($result);
    }

    public function show(Holding $holding, Request $request)
    {
        return response()->json([
            'holding' => $this->holdingRepo->where('id', $request->id)->relTable()->first(),
        ]);
    }

    public function edit(Holding $holding, Request $request)
    {
        return response()->json([
            'holding' => $this->holdingRepo->where('id', $request->id)->relTable()->first(),
        ]);
    }

    public function update(Holding $holding, Request $request)
    {
        $result = $this->holdingRepo->update($request->all());
        return ($result === true)
        ? $this->holdingRepo->successApiResponse('Successfully update holding ' . $request['name'] . '.')
        : $this->holdingRepo->errorApiResponse($result);
    }

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

    /**
     * @param request = field, type, id
     */
    public function asyncValidation(Request $request)
    {
        // push the process to repo
        $result = $this->holdingRepo->asyncValidate($request->query());
        if ($result === true) {
            return [
                'success' => 1,
            ];
        } else {
            return response([
                'success' => 0,
                'message' => $result,
            ], 500);
        }

    }

}
