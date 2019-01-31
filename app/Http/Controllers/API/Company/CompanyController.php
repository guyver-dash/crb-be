<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Repo\Company\CompanyInterface;
use Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyRepo;

    public function __construct(CompanyInterface $company)
    {
        $this->companyRepo = $company;
        $this->authorizeResource(Company::class);
    }
    
    public function index()
    {
        return [
            'companies' => $this->companyRepo->paginate($this->companyRepo->entityNameAddress(app()->make('request'))
                    ->relTable()
                    ->orderBy('created_at', 'desc')
                    ->get()
            ),
        ];
    }    

    public function store(Request $request)
    {
        $result = $this->companyRepo->create($request->all());
        return ($result === true)
        ? $this->companyRepo->successApiResponse('Successfully created company ' . $request['name'] . '.')
        : $this->companyRepo->errorApiResponse($result);

        // return response()->json([
        //     'success' => $request->all(),
        // ]);
    }

    public function show(Company $company, Request $request)
    {
        return ['company' => $this->companyRepo->where('id', $request->id)->relTable()->first()];
    }

    public function edit(Company $company, Request $request)
    {
        return [ 'company' => $this->companyRepo->where('id', $request->id)->relTable()->first() ];
    }

    public function update(Company $company, Request $request)
    {
        $result = $this->companyRepo->update($request->all());
        return ($result === true)
        ? $this->companyRepo->successApiResponse('Successfully update company ' . $request['name'] . '.')
        : $this->companyRepo->errorApiResponse($result);
    }

    public function destroy(Company $company, Request $request)
    {
        $company = $this->companyRepo->find($request->id);
        $company->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    public function companyHoldings(Request $request)
    {
        $company = Company::where('id', $request->id)
            ->with('holding')->first();
        return response()->json([
            'holdings' => $company->holding,
        ]);
    }

    public function userCompanies()
    {
        $companies = Company::whereHas('accessRights.roles.users', function ($q) {
            return $q->where('users.id', Auth::User()->id);
        })->get();
        return response()->json([
            'userCompanies' => $companies,
        ]);
    }
    
    /**
     * @param request = field, type, id
     */
    public function asyncValidation(Request $request)
    {
        // push the process to repo
        $result = $this->companyRepo->asyncValidate($request->query());
        return ($result === true)
        ? $this->companyRepo->successApiResponse()
        : $this->companyRepo->errorApiResponse($result);
    }
}
