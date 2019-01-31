<?php

namespace App\Repo\Company;

use App\Model\Company;
use App\Repo\BaseRepository;
use DB;
use Exception;
use Validator;

class CompanyRepository extends BaseRepository implements CompanyInterface
{

    public function __construct()
    {

        $this->modelName = new Company();
        // TODO: temporary validation
        $this->rules = [
            'name' => 'required|max:255|unique:company,name',
            'desc' => 'required',
        ];
    }

    public function create($data)
    {
        // $validator = Validator::make($data, $this->rules);
        $validator = $this->validate($data, $this->rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        // wrap the model insertion in a transaction
        // so we can rollback if any error
        DB::beginTransaction();
        try {
            $company = $this->modelName->create($data);
            $company = $this->modelName->find($company->id);
            $company->address()->create($data);
            $company->businessInfo()->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return true;
    }

    public function update($data)
    {
        $validator = $this->validate($data, $this->getUpdateRules($data['id']));
        if ($validator->fails()) {
            return $validator->errors();
        }

        $company = $this->where('id', $data['id'])->first();
        if (!$company) {
            return $company;
        }       

        DB::beginTransaction();
        try {
            $company->update($data);
            $company->address()->update($this->addressFillable($data));
            $company->businessInfo()->update($this->businessInfoFillable($data));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return true;
    }    
}
