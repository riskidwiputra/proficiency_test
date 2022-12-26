<?php

namespace App\Modules\inventories\Interfaces;
interface InventoriesRepositoryInterface
{
    public function create(
        $name,
        $price,
        $amount,
        $unit
    );
    
    public function getAllInventories();
}
