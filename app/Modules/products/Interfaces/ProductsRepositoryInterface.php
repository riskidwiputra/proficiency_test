<?php

namespace App\Modules\products\Interfaces;
interface ProductsRepositoryInterface
{
    public function create(
        $name,
        $description,
        $price,
        $id
    );
    public function getAllProducts($id_merchant);
    public function findById($id);
    public function update($data, $id);
    public function delete($id);
    public function createProductVariant($id_product,$id_variant);
    public function GetProductVariant($id_product,$id_variant);
}
