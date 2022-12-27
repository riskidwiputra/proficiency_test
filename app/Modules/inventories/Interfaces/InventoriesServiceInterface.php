<?php

namespace App\Modules\inventories\Interfaces;
interface InventoriesServiceInterface
{
    public function getAll();
    public function createInventories($request,$key);
    public function getById($id);
    public function update($request,$inventories);
    public function delete($id);
    
}
