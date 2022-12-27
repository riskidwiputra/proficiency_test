<?php

namespace App\Modules\inventories\Interfaces;
interface InventoriesRepositoryInterface
{
    public function create(
        $name,
        $price,
        $amount,
        $unit,
        $id
    );
    
    public function getAllInventories();
    public function findById($id);
    public function update($data, $id);
    public function delete($id);
}
