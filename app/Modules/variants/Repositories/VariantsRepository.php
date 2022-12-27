<?php

namespace App\Modules\variants\Repositories;

use App\Models\variants;
use App\Modules\variants\Interfaces\VariantsRepositoryInterface;

class VariantsRepository implements VariantsRepositoryInterface
{
    protected $Variants;

    public function __construct(variants $Variants)
    {
        $this->Variants = $Variants;
    }

    public function create(
        $name,
        $additional_price
    )
    {
        return $this->Variants->create([
            'name'                  => $name,
            'additional_price'      => $additional_price,
        ]);
    }

    public function findById($id){
        return $this->Variants->where('id',$id)->first();
    }
    public function update($data, $id)
    {
        return $this->Variants->where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return $this->Variants->where('id', $id)->delete();
    }

    public function getAllVariants(){
        return $this->Variants->all();
    }
    
}
