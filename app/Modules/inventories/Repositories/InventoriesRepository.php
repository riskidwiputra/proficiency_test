<?php

namespace App\Modules\inventories\Repositories;

use App\Models\inventoriesModel;
use App\Modules\inventories\Interfaces\InventoriesRepositoryInterface;

class InventoriesRepository implements InventoriesRepositoryInterface
{
    protected $inventories;

    public function __construct(inventoriesModel $inventoriesModel)
    {
        $this->inventories = $inventoriesModel;
    }

    public function create(
        $name,
        $price,
        $amount,
        $unit
    )
    {
        return $this->inventories->create([
            'name'          => $name,
            'price'         => $price,
            'amount'        => $amount,
            'unit'          => $unit,

        ]);
    }
    public function update($id, $data)
    {
        return  $this->inventories->where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return $this->inventories->where('id', $id)->delete();
    }

    public function getAllInventories(){
        return $this->inventories->all();
    }
    
}
