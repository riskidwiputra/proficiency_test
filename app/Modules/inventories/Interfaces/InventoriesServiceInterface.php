<?php

namespace App\Modules\inventories\Interfaces;
interface InventoriesServiceInterface
{
    public function getAll();
    public function createInventories($request);
    
}
