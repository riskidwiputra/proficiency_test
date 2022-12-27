<?php

namespace App\Transformer;

use App\Models\sales;
use League\Fractal\TransformerAbstract;

class SalesTransform extends TransformerAbstract
{
  

    public function transform(sales $data)
    {

        return [

            'id'                => $data->id,
            'cart'              => $this->cart($data->orders),
            'total'             => number_format($data->total_price),
            'created'           => date('d F Y H:i:s', strtotime($data->created_at)),
            'payment_method'    => $data->payment_method
        ];
    }
    public function cart($orders)
    {
        $result = [];
        $i = 0;
        foreach ($orders as $variant) {
            $result[$i]['product_id']               = $variant->id_product;
            $result[$i]['price']                    = number_format($variant->product->price);
            if(!empty($variant->variants)){
                $result[$i]['variants']             = $this->variant($variant->variants);
            }
         
            $i++;
        }
        return $result;
    }
    public function variant($data){
        $result = [];
        $i = 0;
        foreach ($data as $variant) {
            $result[$i]['variants_name']       = $variant->name;
            $result[$i]['price']               = $variant->additional_price;
            $i++;
        }
        return $result;
    }
}
