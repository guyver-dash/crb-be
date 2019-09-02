<?php 

namespace App\Traits\Obfuscate;
use Jenssegers\Optimus\Optimus;

trait Optimuss
{
    
    public function optimus(){
        return new Optimus(1580030173, 59260789, 1163945558);

    }
    public function getOptimusIdAttribute(){
        return $this->optimus()->decode($this->id);
    }

    //Id obfuscation should be resolveManually
    public function resolveRouteBinding($value)
    {
       return $this->where('id', $this->optimus()->encode($value) )->first() ?? abort(404);
    }

}