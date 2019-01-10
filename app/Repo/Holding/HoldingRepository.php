<?php

namespace App\Repo\Holding;

use App\Model\Holding;
use App\Repo\BaseRepository;
use DB;
use Exception;
use Validator;

class HoldingRepository extends BaseRepository implements HoldingInterface
{

    public function __construct()
    {

        $this->modelName = new Holding();

    }

    public function create($data)
    {
        // temporary validation
        $validator = Validator::make($data, [
            'name' => 'required|unique:holdings|max:255',
            'desc' => 'required',
        ]);

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

    public function asyncValidate($data)
    {
        // temporary validation
        $validator = Validator::make($data, [
            'name' => 'required|unique:holdings|max:255',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        return true;
    }

}
