<?php

namespace App\Modules\products\Interfaces;
interface ProductsServiceInterface
{
    public function getAll($id_merchant);
    public function createProducts($request,$key);
    public function update($request,$Products);
    public function delete($id);
    public function addVariant($request);
  
    
}
