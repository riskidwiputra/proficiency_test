<?php

namespace App\Modules\orders\Repositories;


use App\Models\orders;
use App\Modules\orders\Interfaces\OrdersRepositoryInterface;

class OrdersRepository implements OrdersRepositoryInterface
{
    protected $orders;

    public function __construct(orders $Orders)
    {
        $this->orders = $Orders;
    }
   
    public function createOrderVariant($id_order,$id_variant){

        return $this->orders->ordersVariant()->create([
            'id_order'      => $id_order,
            'id_variant'    => $id_variant
        ]);

    }
   
}
