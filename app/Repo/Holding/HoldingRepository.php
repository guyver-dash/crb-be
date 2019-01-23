<?php

namespace App\Repo\Holding;

use App\Model\Holding;
use App\Repo\BaseRepository;
use DB;
use Exception;
use Validator;

class HoldingRepository extends BaseRepository implements HoldingInterface
{

    private $rules;

    public function __construct()
    {

        $this->modelName = new Holding();
        // TODO: temporary validation
        $this->rules = [
            'name' => 'required|max:255|unique:holdings,name',
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
            $holding = $this->modelName->create($data);
            $holding = $this->modelName->find($holding->id);
            $holding->address()->create($data);
            $holding->businessInfo()->create($data);
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

        $holding = $this->where('id', $data['id'])->first();
        if (!$holding) {
            return $holding;
        }       

        DB::beginTransaction();
        try {
            $holding->update($data);
            $holding->address()->update($this->addressFillable($data));
            $holding->businessInfo()->update($this->businessInfoFillable($data));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return true;
    }

    public function createValidationByField($data)
    {
        $validator = $this->validate($data, [key($data) => $this->rules[key($data)]]);
        return $validator->fails() ? $validator->errors() : true;
    }

    public function updateValidationByField($data, $id)
    {
        $validator = $this->validate($data, [key($data) => $this->getUpdateRules($id)[key($data)]]);
        return $validator->fails() ? $validator->errors() : true;
    }

    public function getUpdateRules($id)
    {
        $update_rule = $this->rules;
        $update_rule['name'] = $this->rules['name'] . ',' . $id;
        return $update_rule;
    }

    public function validate($data, $rule)
    {
        return $validator = Validator::make($data, $rule);
    }

    public function asyncValidate($data)
    {
        // make the rule array to be pluck from the rule set
        $queryRule = [$data['field'] => $data['value']];
        // type checks
        $actionType = [
            'create' => function () use ($queryRule) {
                return $this->createValidationByField($queryRule);
            },
            'update' => function () use ($queryRule, $data) {
                return $this->updateValidationByField($queryRule, $data['id']);
            },
        ];
        // execute the validation action
        return $actionType[$data['type']]();
    }

}
