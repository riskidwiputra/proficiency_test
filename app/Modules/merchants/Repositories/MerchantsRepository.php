<?php

namespace App\Modules\merchants\Repositories;

use App\Models\merchants;
use App\Modules\merchants\Interfaces\MerchantsRepositoryInterface;

class MerchantsRepository implements MerchantsRepositoryInterface
{
    protected $merchants;

    public function __construct(merchants $merchants)
    {
        $this->merchants = $merchants;
    }
   
    public function getByKey($key){

        return $this->merchants->where('key', $key)->first();

    }
   
}
