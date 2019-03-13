<?php

namespace App\Http\Controllers\Api\ChartAccount;

use App\Http\Controllers\Controller;
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
                $this->chartAccount->when(request('companyId', false), function ($q) use ($request) {
                    return $q->where('company_id', $this->optimus()->encode($request->companyId));
                })
                    ->when(request('filter', false), function ($q) use ($request) {
                        return $q->where('name', 'LIKE', `%${$request->filter}%`);
                    })
                    ->when(request('filter', false), function ($q) use ($request) {
                        return $q->where('remarks', 'LIKE', `%${$request->filter}%`);
                    })
                    ->where('parent_id', '=', 0)
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
            'parentAccount' => $this->chartAccount->where('id', $this->chartAccount->request()->id)->first(),
            'tAccounts' => $this->chartAccount->tAccounts()
        ]);
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
    public function show($id)
{
        //
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
}
