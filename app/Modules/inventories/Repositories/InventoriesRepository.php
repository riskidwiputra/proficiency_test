<?php

namespace App\Modules\inventories\Repositories;

use App\Models\inventories;
use App\Modules\inventories\Interfaces\InventoriesRepositoryInterface;

class InventoriesRepository implements InventoriesRepositoryInterface
{
    protected $inventories;

    public function __construct(inventories $inventories)
    {
        $this->inventories = $inventories;
    }

    public function create(
        $name,
        $price,
        $amount,
        $unit,
        $id
    )
    {
        return $this->inventories->create([
            'name'          => $name,
            'price'         => $price,
            'amount'        => $amount,
            'unit'          => $unit,
            'id_merchant'   => $id
        ]);
    }

    public function findById($id){
        return $this->inventories->where('id',$id)->first();
    }
    public function update($data, $id)
    {
        return $this->inventories->where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return $this->inventories->where('id', $id)->delete();
    }

    public function getAllInventories(){
        return $this->inventories->all();
    }
    
}
