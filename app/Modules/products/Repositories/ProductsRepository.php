<?php

namespace App\Modules\products\Repositories;

use App\Models\products;
use App\Modules\products\Interfaces\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{
    protected $Products;

    public function __construct(products $Products)
    {
        $this->Products = $Products;
    }

    public function create(
        $name,
        $description,
        $price,
        $id
    )
    {
        return $this->Products->create([
            'name'          => $name,
            'description'   => $description,
            'price'         => $price,
            'id_merchant'   => $id
        ]);
    }

    public function findById($id){
        return $this->Products->where('id',$id)->first();
    }
    public function update($data, $id)
    {
        return $this->Products->where('id',$id)->update($data);
    }

    public function delete($id)
    {
        return $this->Products->where('id', $id)->delete();
    }

    public function getAllProducts($id_merchant){
        return $this->Products->where('id_merchant',$id_merchant)->with('variants')->latest()->limit(10)->get();
    }
    
    public function createProductVariant($id_product,$id_variant){
        return $this->Products->productVariant()->create([
                'id_product' => $id_product,
                'id_variant' => $id_variant
        ]);
    }

    public function GetProductVariant($id_product,$id_variant){
        return $this->Products->where('products.id',$id_product)->whereHas('variants',function($query) use($id_variant){
            $query->where('id_variant', $id_variant);
        })->first();
    }
    
}
