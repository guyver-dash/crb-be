<?php

namespace App\Repo\Holding;

use App\Model\Holding;
use App\Repo\BaseRepository;
use DB;
use Exception;

class HoldingRepository extends BaseRepository implements HoldingInterface
{

    public function __construct()
    {

        $this->modelName = new Holding();

    }

    public function create($data)
    {
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

}
