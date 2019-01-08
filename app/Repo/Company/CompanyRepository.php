<?php 

namespace App\Repo\Company;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Company;

class CompanyRepository extends BaseRepository implements CompanyInterface{


    public function __construct(){

        $this->modelName = new Company();
    
    }
}