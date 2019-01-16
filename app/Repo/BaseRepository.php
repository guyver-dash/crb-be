<?php

namespace App\Repo;
use App\Model\Branch;
use App\Model\Company;
use App\Model\Address;
use App\Model\BusinessInfo;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseInterface
{

    protected $modelName;

    public function all()
    {
        return $this->modelName->all();
    }

    public function create($array)
    {
        return $this->modelName->create($array);
    }

    public function where($name, $operator, $value = null)
    {
        if ($value === null) {
            return $this->modelName->where($name, $operator);
        }
        return $this->modelName->where($name, $operator, $value);
    }

    public function update($array)
    {
        return $this->modelName->update($array);
    }

    public function find($id)
    {
        return $this->modelName->find($id);
    }

    public function entityNameAddress($request)
    {
        return $this->modelName->where('name', 'like', '%' . $request->filter . '%')
            ->when($request->sortBy === 'name', function ($q) use ($request) {
                $q->orderBy('name', $request->descending === 'false' ? 'asc' : 'desc');
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
            });
    }

    public function paginate($collection)
    {
        $request = app()->make('request');
        $perPage = $request->perPage === '0' ? $collection->count() : $request->perPage;

        return new LengthAwarePaginator($collection->forPage($request->page, $perPage), $collection->count(), $perPage, $request->page);
    }

    public function addressFillable($array)
    {

        return collect($array)->filter(function ($value, $key) use ($address) {
            return in_array($key, Address::getFillable());
        })->toArray();

    }

    public function businessInfoFillable($array)
    {

        return collect($array)->filter(function ($value, $key) use ($businessInfo) {
            return in_array($key, BusinessInfo::getFillable());
        })->toArray();

    }


    public function companiesNamePaginate($request){

        return $this->paginate( 
                    /**
                     * whereHas('accessRights.roles.users, function($q){
                     *  $q->where('users.id', Auth::User()->id)
                     * })
                     */
                    Company::where('name', 'like', '%'.$request->filter . '%')
                                ->orderBy('created_at', 'asc')
                                ->get() 
            );
    }

    public function branchesNamePaginate($request){
        return $this->paginate(
                    /**
                     * whereHas('accessRights.roles.users, function($q){
                     *  $q->where('users.id', Auth::User()->id)
                     * })
                     */
                Branch::where('name', 'like', '%'.$request->filter . '%')
                        ->where('company_id', $request->companyId)
                        ->orderBy('created_at', 'asc')
                        ->get() 
            );
    }

}
