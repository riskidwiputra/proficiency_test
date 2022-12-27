<?php

namespace App\Transformer;

use App\Models\products;
use League\Fractal\TransformerAbstract;

class ProductTransform extends TransformerAbstract
{
  

    public function transform(products $data)
    {

        return [
            'id'            => $data->id,
            'name'          => $data->name,
            'description'   => $data->description,
            'price'         => number_format($data->price),
            'variants'      => empty($data->variants) ? [] : $this->variants($data->variants)
        ];
    }
    public function variants($variants)
    {
        $result = [];
        $i = 0;
        foreach ($variants as $variant) {
            $result[$i]['name']               = $variant->name;
            $result[$i]['additional_price']   = number_format($variant->additional_price);
            $i++;
        }
        return $result;
    }
}
