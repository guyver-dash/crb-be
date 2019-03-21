<?php

namespace App\Http\Controllers\Api\ChartAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChartAccountFormRequest;
use App\Repo\ChartAccount\ChartAccountInterface;
use App\Traits\Obfuscate\Optimuss;
use Illuminate\Http\Request;

class ChartAccountController extends Controller
{
    use Optimuss;
    protected $chartAccount;
    public function __construct(ChartAccountInterface $chartAccount, Request $request)
    {
        $this->chartAccount = $chartAccount;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = $this->chartAccount->request();
        return response()->json([
            'chartAccounts' => $this->chartAccount->paginate(
                $this->chartAccount
                    ->when(request('filter') !== null, function ($q) use ($request) {
                        return $q->where('name', 'LIKE', '%' . $request->filter . '%');
                    })
                    ->when(request('filter') === null, function ($q) {
                        return $q->where('parent_code', '=', 0);
                    })
                    ->with(['allChildren', 'tAccount'])
                    ->orderBy('created_at', 'desc')
                    ->get()
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'parentAccount' => $this->chartAccount->whereNoObfuscate('account_code', request('account_code'))->first(),
            'tAccounts' => $this->chartAccount->tAccounts(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartAccountFormRequest $request)
    {
        $this->chartAccount->create($request->all());

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
    public function show($id)
    {
        return response()->json([
            'chartAccount' => $this->chartAccount->whereNoObfuscate('account_code', request('account_code'))->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        return response()->json([
            'chartAccount' => $this->chartAccount->whereNoObfuscate('account_code', request('account_code'))->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->chartAccount->whereNoObfuscate('account_code', request('account_codee'))->first()
            ->update($request->all());

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
    public function destroy($id)
    {
        $this->chartAccount->whereNoObfuscate('account_code', request('account_code'))->first()->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
